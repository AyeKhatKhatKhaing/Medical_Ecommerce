$(document).ready(function () {
   viewFunction()
   function viewFunction(){
        if(getView() == 'grid-view'){
            gridView()
        }
        else if(getView() == 'list-view'){
            listView()
        }
        else{
            listView()
        }
   } 
    $('.me-header-top').addClass('hidden');
    var clickORnot = false;
    function getUrl(page = null) {
        const sub_category = [];
        const brand = [];
        const price_tag = [];
        const time_slot_tag = [];
        const product_highlight_tag = [];
        const tab_filter = [];
        const key_item = [];
        const view = [];

        $('.merchant-checkbox:checked').each(function () {
            brand.push($(this).val());
        })
        let str_brand = brand.toString();
        
        $('.sub-category-checkbox:checked').each(function () {
            sub_category.push($(this).val());
        })
        let str_cat = sub_category.toString();
    
        $('.price-tag-checkbox:checked').each(function () {
            price_tag.push($(this).val());
        })
        let str_price_tag = price_tag.toString();
       

        $('.time-slot-checkbox:checked').each(function () {
            time_slot_tag.push($(this).val());
        })
        let str_time_slot_tag = time_slot_tag.toString();

        $('.product-highlight-tag-checkbox:checked').each(function () {
            product_highlight_tag.push($(this).val());
        })

        let str_product_highlight_tag = product_highlight_tag.toString();

        // $('.rpl-m.active').each(function () {
        //     tab_filter.push($(this).data("value"));
        // })

        if ($(window).innerWidth() < 1000) {
            // view.push($('.m-view.selected').data("value"));
            $('.rpl-m.active').each(function () {
                tab_filter.push($(this).data("value"));
            })
        } else {
            // view.push($('.view.selected').data("value"));
            $('.rpl-d.active').each(function () {
                tab_filter.push($(this).data("value"));
            })
        }
        $(window).on('resize', function () {
            if ($(window).innerWidth() < 1000) {
                $('.rpl-m.active').each(function () {
                    tab_filter.push($(this).data("value"));
                })
                // view.push($('.m-view.selected').data("value"));
            } else {
                $('.rpl-d.active').each(function () {
                    tab_filter.push($(this).data("value"));
                })
                // view.push($('.view.selected').data("value"));
            } 
        })


        let str_tab_filter = tab_filter;

        $('.key-item-checkbox:checked').each(function () {
            key_item.push($(this).val());
        })
        let str_key_item = key_item.toString();
        if ($(window).innerWidth() < 1000) {
            view.push($('.m-view.selected').data("value"));
        } else {
            if(clickORnot){
                view.push($('.product_sidebar_container .product-listing-tab .view-icon.selected').attr("data-value"));
                // console.log(view,"asdf",$('.product_sidebar_container .product-listing-tab .view-icon.selected').attr("data-value"));
            }
            else{
                view.push($('.product_sidebar_container .product-listing-tab .view-icon:not(.selected)').attr("data-value"));
                // console.log(view,"asdf",$('.product_sidebar_container .product-listing-tab .view-icon.selected').attr("data-value"));
            }
           
        }
        $(window).on('resize', function () {
            if ($(window).innerWidth() < 1000) {
                view.push($('.m-view.selected').data("value"));
            } else {
                view.push($('.product-listing-tab .view-icon.selected').attr("data-value"));
                // $('.product-listing-tab .view-icon.selected').attr("data-value")
            } 
        })
    let str_view = view;
    console.log(str_view,"str view")
    const urlParams = new URLSearchParams(window.location.search);
    if (!page)
    page = urlParams.get('page');
    if (sub_category.length > 0)
        urlParams.set('pc', str_cat);
    else
        urlParams.delete('pc');

    if (brand.length > 0)
        urlParams.set('pb', str_brand);
    else
        urlParams.delete('pb');

    if (price_tag.length > 0)
        urlParams.set('pt', str_price_tag);
    else
        urlParams.delete('pt');

    if (time_slot_tag.length > 0)
        urlParams.set('st', str_time_slot_tag);
    else
        urlParams.delete('st');

    if (product_highlight_tag.length > 0)
        urlParams.set('ht', str_product_highlight_tag);
    else
        urlParams.delete('ht');

    if (tab_filter.length > 0)
        urlParams.set('tf', str_tab_filter);
    else
        urlParams.delete('tf');

    if (key_item.length > 0)
        urlParams.set('ki', str_key_item);
    else
        urlParams.delete('ki');

    if (view.length > 0)
        urlParams.set('view', str_view);
    else
        urlParams.delete('view');
    if (page)
        urlParams.set('page', page)
    else
        urlParams.delete('page')
    // let main_url = window.location.href;
    let main_url = window.location.href.split('?')[0];
    main_url += "?" + urlParams.toString();
    window.history.pushState('', '', main_url);
    return main_url;
    }

    function getProducts(url) {
    filterLoading();
    $.ajax({
        url: url,
        cache: false,
        async: false,
    }).done(function (data) {
        // setTimeout(()=> {
        $('.product_sidebar_container').html(data);  
        viewFunction();         
        isSelectAll();
        if ($(window).innerWidth() < 1000) {
            $('.filter-right-icon .filter-icon').click();
        }
        $(window).on('resize', function () {
            if ($(window).innerWidth() < 1000) {
             $('.filter-right-icon .filter-icon').click();
            }
        })
        const accordionBody = document.querySelectorAll('.accordion-body');
        accordionBody.forEach((ebody) => {
        const bodyLi = ebody.querySelectorAll("ul li");
        const seeMore = ebody.querySelectorAll('.sidebar-seemore');
        seeMore.forEach((sm) => {
        if(bodyLi.length > 8) {
        sm.classList.remove('hidden');
        } else {
        sm.classList.add('hidden');
        }
        })
        })

       
        filterHideLoading();
        // },3000);
    }).fail(function () {
        alert('Data could not be loaded.');
    });  
 }

    
    function updateUrl(){
        const urlParamsNew = new URLSearchParams(window.location.search);
        urlParamsNew.delete('ss');
        let main_url_new = window.location.href.split('?')[0];
        main_url_new += "?" + urlParamsNew.toString();
        window.history.pushState('', '', main_url_new);
    }

    function getView(){
        const urlParams= new URLSearchParams(window.location.search);
        view = urlParams.get('view');
        console.log(view, "viewFunction");
        return view;
    }

    function listView() {
        filterLoading();
        $.ajax({
            url: plurl,
            cache: false,
        }).done(function (data) {
            $(".recommend").html(data);  
            filterHideLoading(); 
        }).fail(function () {
            alert('Data could not be loaded.');
            });
    }

    function gridView(){
        filterLoading();
        $.ajax({
            url: '/product-grid',
            cache: false,
        }).done(function (data) {
            $(".product-cards").html(data); 
            filterHideLoading();  
        }).fail(function () {
            alert('Data could not be loaded.');
            });
    }
    
    $(document).on('change','input[name="sub-category"]',function(){
        clickORnot = true;
        updateUrl();
        isSelectAll();
        // if ($(this).prop('checked') == false) {
        // $(this).closest('ul').find('.category-all-checkbox').prop('checked', false);
        // }
        const $mainId = $('.content-group.content-group-active').attr('id');
        if ($('#'+ $mainId +' input[name="sub-category"]:checked').length == $('#'+ $mainId +' input[name="sub-category"]').length) {
        $('#'+ $mainId + ' input[name="category-all-checkbox"]').prop('checked',true);
        } else {
        $('#'+ $mainId + ' input[name="category-all-checkbox"]').prop('checked',false);
        $('#'+ $mainId +' ul li:not(:first-child)').removeAttr('style');
        }
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $(document).on('change','input[name="merchant"]',function(){
        clickORnot = true;
        updateUrl();
        isSelectAll();
        // const $mainId = $('.content-group.content-group-active').attr('id');
        if ($('input[name="merchant"]:checked').length == $('input[name="merchant"]').length) {
        $('input[name="merchant-all-checkbox"]').prop('checked',true);
        } else {
        $('input[name="merchant-all-checkbox"]').prop('checked',false);
        $('.brand-group ul li:not(:first-child)').removeAttr('style');
        }

        // $('.merchant-all-checkbox').prop('checked', true);
        // $('.brand-group input[type="checkbox"]').each(function () {
        //     if ($(this).prop('checked') == false){
        //         $('.merchant-all-checkbox').prop('checked', false);
        //     }
        // })
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $(document).on('change', '.product-sidebar .price-tag-checkbox', function(e) {
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        e.preventDefault();
        // viewFunction()
    })
    $(document).on('change', '.product-sidebar .time-slot-checkbox', function() {
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })
    $(document).on('change', '.product-sidebar .key-item-checkbox', function() { 
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })
    $(document).on('change', '.product-sidebar .product-highlight-tag-checkbox', function() {
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $('.search-btn').on('click', function () {
    let url = getUrl(1)
    getProducts(url)
    // viewFunction()
    location.reload();
    })

    $(document).on('click', '.clear-btn', function (e) {
        e.preventDefault();
        clickORnot = true;
        $('.product-sidebar input:checkbox').prop('checked', false);
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
        // location.reload();
    })

    $(document).on('click', '.custom-close', function (e) {
        e.preventDefault();
        clickORnot = true;
        var checkboxId = $(this).data('checkbox');
        $('#' + checkboxId).prop('checked', false);
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $(document).on("click", ".pltabs-m .pltabs-list-m", function () {
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $(document).on("click", ".pltabs-d .pltabs-list-d", function () {
        clickORnot = true;
        updateUrl();
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    $('.category-all-checkbox').click(function () {
        clickORnot = true;
        updateUrl();
        if (!$(this).is(':checked')) {
            if ($(this).val() == "all") {
            $('#categoryDropdown .content-group-active ul li:not(:first-child)').css('opacity', 1);
            $('#categoryDropdown .content-group-active ul li:not(:first-child)').css('pointer-events', 'all');
            }
            }
            else {
            $('#categoryDropdown .content-group-active ul li:not(:first-child)').css('opacity', 0.6);
            $('#categoryDropdown .content-group-active ul li:not(:first-child)').css('pointer-events', 'none');
        }
        $('.content-group-active input[type="checkbox"]').not(this).prop('checked', this.checked);
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })
    $('.merchant-all-checkbox').click(function () {
        clickORnot = true;
        updateUrl();
        if (!$(this).is(':checked')) {
            if ($(this).val() == "all") {
            $('#brandDropdown .brand-group ul li:not(:first-child)').css('opacity', 1);
            $('#brandDropdown .brand-group ul li:not(:first-child)').css('pointer-events', 'all');
            }
            }
            else {
            $('#brandDropdown .brand-group ul li:not(:first-child)').css('opacity', 0.6);
            $('#brandDropdown .brand-group ul li:not(:first-child)').css('pointer-events', 'none');
            }
        $('.brand-group input[type="checkbox"]').not(this).prop('checked', this.checked);
        let url = getUrl(1)
        getProducts(url)
        // viewFunction()
    })

    function isSelectAll() {
    
        var $h = $('.sidebar-tab-active').data('group-target');
        var $t=$($h).find('.sub-category-checkbox');

        $($h).find('.category-all-checkbox').prop('checked', true);
        $($h).find('.sub-category-checkbox').each(function () {
            if ($(this).prop('checked') == false){
                $($h).find('.category-all-checkbox').prop('checked', false);
            }
        })
        $('.merchant-all-checkbox').prop('checked', true);
        $('.brand-group input[type="checkbox"]').each(function () {
            if ($(this).prop('checked') == false){
                $('.merchant-all-checkbox').prop('checked', false);
            }
        })
    }
    $('.sidebar-tab').on('click', function () {
        clickORnot = true;
        isSelectAll();
    })
    isSelectAll();

    $('body').on('click', '.product-list .product-lists-view', function (e) {   
        e.preventDefault();
        clickORnot = false;
        updateUrl();
        let url = getUrl(1)
        getProducts(url);
        viewFunction();
    })
    $('body').on('click','.product-listing-tab-mobile .product-lists-view ', function (e) {
        e.preventDefault();
        clickORnot = false;
        updateUrl();
        let url = getUrl(1)
        // getProducts(url);
        viewFunction()
    })
    $('body').on('click', '.product-list-pagination a', function (e) {
        clickORnot = true;
        e.preventDefault();
        let page_number = $(this).attr('href').split('page=')[1];
        let url = getUrl(page_number)
        getProducts(url);
    })
});

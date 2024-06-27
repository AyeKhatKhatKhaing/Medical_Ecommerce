$(document).ready(function () {
    let c_filter, sc_filter = null;
    //$('.me-header-top').addClass('hidden');

    function getUrl(page = null) {

        const urlParams = new URLSearchParams(window.location.search);
        if (!page)
            page = urlParams.get('page');

        if (sc_filter != null)
            urlParams.set('selectedSubCategory', sc_filter);
        else
            urlParams.delete('selectedSubCategory');
        if (c_filter != null)
            urlParams.set('selectedCategory', c_filter);
        else
            urlParams.delete('selectedCategory');
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

    function getCoupons(url) {
        $('.clinnertabs-content').html("");
        $.ajax({
            url: url,
            cache: false,
        }).done(function (data) {
            $('.coupon-list').html(data);
        }).fail(function () {
            alert('Data could not be loaded.');
        });
    }
   
    $('.search-btn').on('click', function () {
        let url = getUrl(1)
        getCoupons(url)
        location.reload();
    })

    $('body').on('click', '.clear-btn', function (e) {
        e.preventDefault();
        $('input:checkbox').prop('checked', false);
        let url = getUrl(1)
        getCoupons(url)
        // location.reload();
    })

    $('body').on('click', '.plst-close-btn', function (e) {
        e.preventDefault();
        var checkboxId = $(this).data('checkbox');
        $('#' + checkboxId).prop('checked', false);
        let url = getUrl(1)
        getCoupons(url)
    })


    $('body').on('click', '.clinnertabs li', function (e) {
        e.preventDefault();
        sc_filter = $(this).attr("data-value");
        let url = getUrl(1)
        getCoupons(url);

    });

    $('body').on('click', '.main-filter li', function (e) {
        e.preventDefault();
        c_filter = $(this).attr("data-value");
        let url = getUrl(1)
        getCoupons(url);

    });

    $('body').on('click', '.coupon-list-pagination a', function (e) {
        e.preventDefault();
        let page_number = $(this).attr('href').split('page=')[1];
        let url = getUrl(page_number)
        getCoupons(url);

    })
});

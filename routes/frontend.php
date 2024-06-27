<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\FrontendPagesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\BlogController;

// Route::get('sample-data', 'App\Http\Controllers\Frontend\FrontendPagesController@sampleDateApi');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['cors','localize', 'localizationRedirect','localeSessionRedirect']], function () {
    Route::controller(FrontendPagesController::class)->group(function () {
        Route::get(LaravelLocalization::transRoute('routes.home'), 'index')->name('mediq');
        Route::get(LaravelLocalization::transRoute('routes.products'), 'productListings')->name('products.listings');
        Route::get('/collect-coupon', 'collectCoupon')->name('collect-coupon');
        Route::get('/add-to-cart', 'addToCart')->name('cart.add-to-cart');
        Route::get('/remove-cart','removeCart')->name('cart.removeCart');
        Route::post('/search-keyword', 'searchKeyword')->name('search-keyword');

        Route::get('/product/{category}/{slug}', 'productDetail')->name('product-detail');
        Route::post('/bookNow', 'bookNow')->name('bookNow');

        Route::post('search-ajax', 'searchAjax')->name("search.ajax");
        Route::post('search-ajax-mobile', 'searchAjaxMobile')->name("search.ajax.mobile");
        Route::post('product-count', 'countProducts')->name("products.count");
        Route::post('product-modal', [FrontendPagesController::class, 'productModal'])->name('product.modal');
        Route::get('product-grid', [FrontendPagesController::class, 'productGrid'])->name('product.gird');
        Route::get('plurl', [FrontendPagesController::class, 'productList'])->name('product.list');
        Route::post('search', 'search')->name("search");
        Route::post('search_products', 'search_products')->name("search_products");
        Route::post('search/remove', 'searchRemove')->name("search.remove");

        Route::get("compare-product/", 'compareProduct')->name("product.compare");
        Route::post("compare-product/suggestion-product-ajax", 'suggestionProductAjax')->name("suggestion.product.ajax");
        Route::get('privacy', 'privacy_policy')->name("privacy.policy");
        Route::get('tnc', 'term_of_use')->name("termofuse");
        Route::get('coupon-terms-of-use', 'coupon_term_of_use')->name("termofuse.coupon");

        Route::post("product-details/add-remove-compare", 'addOrRemoveProductCompare')->name("product.addremove.compare");

        // Route::get("remove/comparepage/session",function(\Illuminate\Http\Request $request) {
        //         $request->session()->put('comparepage_session',false);
        // });
        Route::get('sitemap.xml', 'sitemapxml')->name("sitemap");

        //contact us
        Route::get('contact-us', [FrontendPagesController::class, 'contactUs'])->name('contact');
        //carrier
        Route::get('career', [FrontendPagesController::class, 'carrier'])->name('carrier');
        Route::get('career/{name}', 'carrierDetail')->name('carrier.detail');
        //about us
        Route::get('about-us', [FrontendPagesController::class, 'about'])->name('about');
        //best price
        Route::get('service-guarantee', [FrontendPagesController::class, 'bestPrice'])->name('best');
        //partnership
        Route::get('partner', [FrontendPagesController::class, 'partnership'])->name('partnership');
        Route::post('partnership', [FrontendPagesController::class, 'savePartnership'])->name('partnership.save');
        //booking process
        Route::get('steps-to-book', [FrontendPagesController::class, 'booking'])->name('booking.process');

        Route::get('guide', [FrontendPagesController::class, 'quickStart'])->name('quick.start');

        Route::post('cookie', [FrontendPagesController::class, 'cookie'])->name('cookie');
        
        Route::post('products-brand-category', [FrontendPagesController::class, 'brandCategory'])->name('products.category.brands');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer-register', 'register')->name('customer.register');
        Route::post('/customer-register', 'registerValidate')->name('customer.register-validate');
        Route::get(LaravelLocalization::transRoute('routes.customer_login'), 'login')->name('get.customer.login');
        Route::post('/customer-login', 'loginValidate')->name('customer.login');
        Route::post('/customer-logout', 'logout')->name('customer.logout');

        Route::post('/send-SMS-verification', 'sendSMSVerification')->name('sendSMS');
        Route::post('/send-email-verification', 'sendEmailVerification')->name('sendEmail');
        Route::get('/email-verification/{code}/{email}/{password}', 'emailVerification')->name('emailVerification');

        Route::post('/send-login-email-verification', 'sendLoginEmailVerification')->name('sendLoginEmail');
        Route::get('/email-login-verification/{code}/{email}', 'emailLoginVerification')->name('emailLoginVerification');

        Route::get('auth/google', 'redirectToGoogle');
        Route::get('auth/google/callback', 'handleGoogleCallback');

        Route::get('auth/facebook', 'redirectFacebook');
        Route::get('auth/facebook/callback', 'facebookCallback');

        Route::get('customer/activate/{activation_code}', 'customerMailActivation')->name('customer.activate_mail');

        Route::post('subscribe', [CustomerController::class, 'subscribe'])->name('subscribe');

    });

    Route::group(['middleware' => ['customer']], function () {
        Route::controller(CheckoutController::class)->group(function () {
            Route::get('checkout/selected-item', 'checkoutInit')->name('checkout.init');
            Route::get('checkout/enter-information', 'checkoutInfo')->name('checkout.info');
            Route::get('checkout/order-checkout', 'checkoutPayment')->name('checkout.payment');
            Route::post('save-check-up-items', 'saveCheckUpItems')->name('checkout.saveCheckUpItems');
            Route::post('save-check-up-locations', 'saveCheckUpLocations')->name('checkout.saveCheckUpLocations');
            Route::post('save-add-on-items', 'saveAddOnItems')->name('checkout.saveAddOnItems');
            Route::post('save-packages', 'savePackages')->name('checkout.savePackages');
            Route::post('remove-recipient', 'removeRecipient')->name('checkout.removeRecipient');
            Route::post('update-recipient-info', 'updateRecipientInfo')->name('checkout.updateRecipientInfo');
            Route::post('check-promocode', 'checkPromoCode')->name('checkout.checkPromoCode');
            Route::post('book-now', 'bookNow')->name('checkout.bookNow');
            Route::post('order-checkout', 'orderCheckout')->name('checkout.orderCheckout');
            Route::get('checkout/order-confirmed/{invoice}', 'checkoutComplete')->name('checkout.checkoutComplete');
            Route::get('checkout/order-pending/{invoice}', 'checkoutPending')->name('checkout.checkoutPending');
            Route::post('check-phone-no', 'checkPhoneNo')->name('checkout.checkPhoneNo');
            Route::post('checkout-paymentIntents', 'paymentIntents')->name('checkout.paymentIntents');
        });

        Route::controller(CustomerController::class)->group(function () {
            Route::get('coupon', 'dashboardCoupon')->name('dashboard.coupon');
            Route::post('coupon/redeem', 'dashboardCouponRedeem')->name('dashboard.coupon.redeem');
            Route::get('favorite', 'dashboardWishlist')->name('dashboard.wishlist');
            Route::post('favorite/product', 'dashboardProductFavourite')->name('dashboard.wishlist.favourite.product');
            Route::post('favorite/remove/recently/compared', 'dashboardRemoveRecentlyCompared')->name('dashboard.wishlist.remove.recently.compared');
            Route::get('account/setting', 'setting')->name('dashboard.myacc.setting');
            Route::post('account/setting/changepassword', 'changePassword')->name('dashboard.myacc.changepassword');
            Route::post('account/setting/updatenotification', 'updatenNotification')->name('dashboard.myacc.updatenotification');
            Route::get('account/information', 'basicInfo')->name('dashboard.myacc.basicinfo');
            Route::post('account/information/changepersonalinfo', 'changePersonalInfo')->name('dashboard.myacc.basicinfo.changepersonalinfo');
            Route::post('account/information/file-upload', 'fileUpload')->name('dashboard.myacc.basicinfo.fileupload');
            Route::post('account/information/save-family-member-info', 'saveFamilyMemberInfo')->name('dashboard.myacc.basicinfo.save.familymember.info');
            Route::post('account/information/get-vaccine-info', 'getVaccineInfo')->name('dashboard.myacc.basicinfo.get.vaccine.info');
            Route::post('account/information/save-vaccine-info', 'saveVaccineInfo')->name('dashboard.myacc.basicinfo.save.vaccine.info');
            Route::post('account/information/get-vaccine-details-info', 'getVaccineDetailsInfo')->name('dashboard.myacc.basicinfo.get.vaccine.details.info');
            Route::post('account/information/get-health-record-info', 'getHealthRecordInfo')->name('dashboard.myacc.basicinfo.get.health.record.info');
            Route::post('account/information/save-health-record-info', 'saveHealthRecordInfo')->name('dashboard.myacc.basicinfo.save.health.record.info');
            Route::get('overview', 'dashboard')->name('dashboard.general');
            Route::get('mybooking', 'dashboardBooking')->name('dashboard.booking');
            Route::get('mybooking/details/{id}/{download?}', 'bookingDetails')->name('dashboard.booking.details');
            Route::post('mybooking/details/payslip-upload', 'payslipUpload')->name('dashboard.booking.details.payslipupload');
            Route::post('mybooking/details/send-e-receipt', 'sendEReceipt')->name('dashboard.booking.details.send.ereceipt');
            Route::get('mybooking/details/download-e-receipt', 'downloadEReceipt')->name('dashboard.booking.details.download.ereceipt');
            Route::post('mybooking/details/upload-cancel-refund', 'uploadCancelRefund')->name('dashboard.booking.details.upload.cancel.refund');
            Route::get('account/healthrecord', 'healthProfile')->name('dashboard.myacc.health.profile');
            Route::post('account/healthrecord/get-record-info', 'getRecordInfo')->name('dashboard.myacc.get.record.info');
            Route::post('account/healthrecord/file-upload', 'recordFileUpload')->name('dashboard.myacc.healthprofile.fileupload');
            Route::post('account/healthrecord/delete-record-info', 'deleteRecordInfo')->name('dashboard.myacc.delete.record.info');
            Route::get('profile', [CustomerController::class, 'mobileProfile'])->name('mobile.profile');
        });
    });

    Route::controller(CouponController::class)->group(function () {
        Route::get('/coupon-list', 'index')->name('coupon.list');
        //Route::post('/coupon/collect/{coupon_id}', 'registerValidate')->name('coupon.collect');
    });
    Route::controller(FaqController::class)->group(function () {
        Route::get('helpcenter', [FaqController::class, 'index'])->name('faq');
        Route::post('faq-search', [FaqController::class, 'search'])->name('faq.search');
        Route::post('faq-change-status', [FaqController::class, 'changeStatus'])->name('faq.change.status');
        // Route::get('helpcenter-category/{category}', [FaqController::class, 'category'])->name('faq.category');
        Route::get('helpcenter-category', [FaqController::class, 'category'])->name('faq.category');
        Route::get('helpcenter-sub-category/{category}', [FaqController::class, 'subCategory'])->name('faq.sub.category');
        Route::post('keyword-search', [FaqController::class, 'searchKeyword'])->name('keyword.search');
        Route::get('helpcenter-detail/{id}', [FaqController::class, 'detail'])->name('faq.detail');
    });

    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog.list');
        Route::get('/blog/{category_name}', 'blogListByCategoryName')->name('blog.list.category');
        Route::get('/blog/search/{filter_keywords}', 'blogListSearchByFilterKeywords')->name('blog.list.search.filter.keywords');
        Route::get('/blog/{category_name}/{slug}', 'blogDetails')->name('blog.details');
        Route::post('/blog/details/', 'blogDetailsFormSubmissions')->name('blog.details.form.submissions');
        Route::post('/blog/details/like/dislike', 'blogDetailsLikeDislike')->name('blog.details.like.dislike');
        Route::post('/blog/subscribe', 'subscribe')->name('blog.subscribe');
        //Route::post('/coupon/collect/{coupon_id}', 'registerValidate')->name('coupon.collect');
    });
});
// Route::fallback(function(){
//     return view('404');
// });

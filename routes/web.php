<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\Admin\FootersController;
use App\Http\Controllers\Admin\HeadersController;
use App\Http\Controllers\Admin\WeekDayController;
use App\Http\Controllers\Admin\BankInfoController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\OfficeInfoController;

// use Appzcoder\LaravelAdmin\Controllers\ProcessController;

Route::get('/', function () {
    $users = DB::table('users')
        ->get();
    return view('welcome', compact($users));
})->name('welcome');

Route::controller(AdminController::class)->group(function () {
    Route::get('/letadminin', 'login')->name('letadminin');
    Route::post('/letadminin', 'loginValidate')->name('login');
    Route::post('/letadminin/logout', 'logout')->name('logout');
});

Route::controller(FullCalendarController::class)->group(function () {
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::controller(WeekDayController::class)->group(function () {
    Route::post('/weekday', 'addweekDay');
});

// Route::controller(CustomerController::class)->group(function(){
//     // Route::get('/customerregister', 'register')->name('customerregister');
//     Route::post('/customerregister', 'registerValidate')->name('customerregister');
//     Route::get('/customerlogin', 'login')->name('customerlogin');
//     Route::post('/customerlogin','loginValidate')->name('customerlogin');
//     Route::post('/customerlogout','logout')->name('customerlogout');
// });

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});
Route::get('admin/generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

// Admin
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('users', 'UsersController');
    Route::get('user/{user_type}', 'UsersController@userList')->name('users.list');
    Route::get('user/{user_type}/create', 'UsersController@userCreate')->name('users.create-user');
    Route::get('user/{id}/edit/{user_type}', 'UsersController@userEdit')->name('users.edit-user');
    Route::post('user/{id}/update/{user_type}', 'UsersController@userUpdate')->name('users.update-user');
    Route::delete('user/{id}/destroy/{user_type}', 'UsersController@userDestroy')->name('users.destroy-user');
    Route::post('/users/getData', 'UsersController@getData');
    Route::get('merchant/location-calendar', 'UsersController@merchantLocation')->name('users.merchant-location');
    Route::post('/user/merchant/publishedenabled', 'UsersController@publishedEnabled')->name('merchantPublishedEnabled');
    Route::post('get-plan-process', 'UsersController@getPlanProcess')->name('admin.get-plan-process');
    Route::post('get-plan-description', 'UsersController@getPlanDescription')->name('admin.get-plan-description');

    Route::resource('roles', 'RolesController');
    Route::post('roles/getData', 'RolesController@getData');

    Route::resource('permissions', 'PermissionsController');
    Route::post('/permissions/getData', 'PermissionsController@getData');

    Route::resource('pages', 'PagesController');
    Route::post('/pages/getData', 'PagesController@getData');
    Route::post('/pages/status-change', 'PagesController@statusChange')->name('pageChangeStatus');
    Route::get('/auto-translate', 'PagesController@page_translate');

    // Route::resource('headers', 'HeadersController');
    // Route::post('/header/getData', 'HeadersController@getData');
    Route::get('header', 'HeadersController@index');
    Route::post('header', 'HeadersController@update');
    Route::get('/header-auto-translate', 'HeadersController@header_translate');
    Route::post('get-slide-process', 'HeadersController@getSlideText')->name('admin.get-slide-process');

    Route::get('footer', 'FootersController@index');
    Route::post('footer', 'FootersController@update');
    Route::get('/footer-auto-translate', 'FootersController@footer_translate');

    Route::resource('sliders', 'SlidersController');
    Route::post('/slider/getData', 'SlidersController@getData');
    Route::post('/sliders/status-change', 'SlidersController@statusChange')->name('sliderChangeStatus');
    Route::post('/sliders/duration', 'SlidersController@duration')->name('changeDuration');


    Route::resource('dashboard-sliders', 'DashboardSliderController');
    Route::post('/dashboard-sliders/getData', 'DashboardSliderController@getData');
    Route::post('/dashboard-sliders/status-change', 'DashboardSliderController@statusChange')->name('dashboard.slider.changeStatus');
    Route::get('/dashboard-sliders-auto-translate', 'DashboardSliderController@dashboard_translate');


    Route::resource('territories', 'TerritoriesController');
    Route::post('/territories/getData', 'TerritoriesController@getData');
    Route::get('/territory-auto-translate', 'TerritoriesController@territory_translate');
    Route::post('/territories/status-change', 'TerritoriesController@statusChange')->name('territoryChangeStatus');

    Route::resource('districts', 'DistrictsController');
    Route::post('/districts/getData', 'DistrictsController@getData');
    Route::get('/district-auto-translate', 'DistrictsController@district_translate');
    Route::post('/districts/status-change', 'DistrictsController@statusChange')->name('districtChangeStatus');

    Route::resource('areas', 'AreasController');
    Route::post('/areas/getData', 'AreasController@getData');
    Route::get('/area-auto-translate', 'AreasController@area_translate');
    Route::post('/areas/status-change', 'AreasController@statusChange')->name('areaChangeStatus');

    Route::resource('coupon', 'CouponController');
    Route::post('/coupon/getData', 'CouponController@getData');
    Route::post('/coupon/status-change', 'CouponController@statusChange')->name('couponChangeStatus');



    Route::get('home', 'HomeController@index');
    Route::post('home', 'HomeController@update');
    Route::post('/home/getData', 'HomeController@getData');
    Route::post('/home/status-change', 'HomeController@statusChange')->name('homeChangeStatus');
    Route::get('/home-auto-translate', 'HomeController@home_translate');
    Route::post('/home/homeRemoveImage', 'HomeController@removeImage')->name('homeRemoveImage');

    Route::resource('activitylogs', 'ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
    Route::post('/activitylogs/getData', 'ActivityLogsController@getData');

    Route::resource('settings', 'SettingsController');

    // Route::resource('posts', 'PostsController');

    //tinymce image upload
    Route::post('/upload', 'AdminController@upload');

    /*
    |--------------------------------------------------------------------------
    | This is the route for FileManagerController
    |--------------------------------------------------------------------------
    */
    Route::get('filemanager', 'FileManagerController@fileManager');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CustomerController
    |--------------------------------------------------------------------------
    */
    Route::resource('customer', 'CustomerController');
    Route::post('/customer/getData', 'CustomerController@getData');
    Route::post('/customer/status-change', 'CustomerController@statusChange')->name('customerChangeStatus');
    Route::get('subscriber', [CustomerController::class, 'subscribe'])->name('subscriber.index');
    Route::post('subscriber/list', [CustomerController::class, 'getSubscriberList'])->name('subscriber.list');
    Route::post('customer/update', [CustomerController::class, 'updateCustomer'])->name('customer.info.update');

    Route::get('blog/subscriber', [CustomerController::class, 'Blogsubscribe'])->name('blog.subscriber.index');
    Route::post('blog/subscriber/list', [CustomerController::class, 'getBlogSubscriberList'])->name('blog.subscriber.list');

    /*
    |--------------------------------------------------------------------------
    | This is the route for BlogController
    |--------------------------------------------------------------------------
    */
    Route::resource('blog', 'BlogController');
    Route::post('/blog/getData', 'BlogController@getData');
    Route::post('/blog/status-change', 'BlogController@statusChange')->name('blogChangeStatus');
    Route::get('/blog-auto-translate', 'BlogController@blog_translate');
    Route::get('/blog-eng-auto-translate', 'BlogController@blog_eng_translate');
    Route::get('/blog/details/{blog_id}/{title_id}', 'BlogController@blogDetails')->name("blogDetails");
    Route::post('/blog/details/', 'BlogController@saveBlogDetails')->name("saveBlogDetails");
    Route::get('/blog/formsubmissions/list', 'BlogController@getBlogDetailsFormSubmissionsList')->name("blogDetailsFormSubmissionsList");
    Route::post('/blog/formsubmissions/getData', 'BlogController@getDataFormSubmissions');
    Route::get('/blog/formsubmissions/{id}', 'BlogController@getBlogDetailsFormSubmissions')->name("blogDetailsFormSubmissions");
    Route::post('get-blog-faq-form', 'BlogController@blogFaqForm')->name('admin.get-blog-faq-form');
    Route::post('/blog/get-sub-category', 'BlogController@getSubCategory')->name('admin.get-sub-category');

    Route::get('/blog/{blog_id}/section/{id}/edit', 'BlogSectionController@edit');
    Route::post('/blog/{blog_id}/section/{id}', 'BlogSectionController@update');
    Route::get('/blog/{blog_id}/section/{id}/delete', 'BlogSectionController@destroy');
    Route::get('/blog/{blog_id}/section/{id}/{arr_id}', 'BlogSectionController@feature');
    Route::post('/blog/{blog_id}/section/{id}/{arr_id}', 'BlogSectionController@saveFeature');
    Route::get('/blog/{blog_id}/section/{id}/{arr_id}/{feature_id}', 'BlogSectionController@deleteFeature');
    Route::get('/feature-auto-translate', 'BlogSectionController@blog_translate');
    Route::get('/feature-eng-auto-translate', 'BlogSectionController@blog_eng_translate');

    /*
    |--------------------------------------------------------------------------
    | This is the route for BlogController
    |--------------------------------------------------------------------------
    */
    Route::resource('blog-category', 'BlogCategoryController');
    Route::post('/blog-category/getData', 'BlogCategoryController@getData');
    Route::post('/blog-category/status-change', 'BlogCategoryController@statusChange')->name('blogCategoryChangeStatus');
    Route::get('/blog-category-auto-translate', 'BlogCategoryController@blog_category_translate');

     /*
    |--------------------------------------------------------------------------
    | This is the route for BlogTagController
    |--------------------------------------------------------------------------
    */
    Route::resource('blog-tag', 'BlogTagController');
    Route::post('/blog-tag/getData', 'BlogTagController@getData');
    Route::post('/blog-tag/status-change', 'BlogTagController@statusChange')->name('blogTagChangeStatus');
    Route::get('/blog-tag-auto-translate', 'BlogTagController@blog_tag_translate');

      /*
    |--------------------------------------------------------------------------
    | This is the route for BlogAuthorController
    |--------------------------------------------------------------------------
    */
    Route::resource('blog-author', 'BlogAuthorController');
    Route::post('/blog-author/getData', 'BlogAuthorController@getData');
    Route::post('/blog-author/status-change', 'BlogAuthorController@statusChange')->name('blogAuthorChangeStatus');
    Route::get('/blog-author-auto-translate', 'BlogAuthorController@blog_tag_translate');

      /*
    |--------------------------------------------------------------------------
    | This is the route for BlogCmsController
    |--------------------------------------------------------------------------
    */

    Route::get('/blog-cms', 'BlogCmsController@getData');
    Route::post('/blog-cms', 'BlogCmsController@storeData');

    /*
    |--------------------------------------------------------------------------
    | This is the route for AboutController
    |--------------------------------------------------------------------------
    */
    // Route::resource('about', 'AboutController');
    // Route::post('/about/getData', 'AboutController@getData');
    // Route::get('/about-auto-translate','AboutController@about_translate');
    Route::get('about', 'AboutController@index');
    Route::post('about', 'AboutController@update');

    Route::resource('/milestone-year', 'MilestoneYearController');
    Route::post('/milestone-year/getData', 'MilestoneYearController@getData');
    Route::post('/milestone-year/status-change', 'MilestoneYearController@statusChange')->name('milestoneYearChangeStatus');
    Route::post('get-month-form', 'MilestoneYearController@monthForm')->name('admin.get-month-form');
    Route::get('/milestone-year-auto-translate', 'MilestoneYearController@milestone_year_translate');

    // Route::resource('milestone-detail', 'MilestoneDetailController');
    /*
    |--------------------------------------------------------------------------
    | This is the route for FaqController
    |--------------------------------------------------------------------------
    */
    Route::resource('faq', 'FaqController');
    Route::post('/faq/getData', 'FaqController@getData');
    Route::post('/faq/status-change', 'FaqController@statusChange')->name('faqChangeStatus');
    Route::get('/faq-auto-translate', 'FaqController@faq_translate');
    Route::get('/faq-page', 'FaqController@faq_page');
    Route::post('/faq-page', 'FaqController@faq_save');


    /*
    |--------------------------------------------------------------------------
    | This is the route for FaqCategoryController
    |--------------------------------------------------------------------------
    */
    Route::resource('faq-category', 'FaqCategoryController');
    Route::post('/faq-category/getData', 'FaqCategoryController@getData');
    Route::post('/faq-category/status-change', 'FaqCategoryController@statusChange')->name('faqCategoryChangeStatus');
    Route::get('/faq-category-auto-translate', 'FaqCategoryController@faq_category_translate');

    Route::resource('faq-sub-category', 'FaqSubCategoryController');
    Route::post('/faq-sub-category/getData', 'FaqSubCategoryController@getData');
    Route::post('/faq-sub-category/status-change', 'FaqSubCategoryController@statusChange')->name('faqsubCategoryChangeStatus');
    Route::get('/faq-sub-category-auto-translate', 'FaqSubCategoryController@faq_sub_category_translate');


    Route::resource('products', 'ProductsController');
    Route::post('/products/getData', 'ProductsController@getData');
    Route::post('/products/status-change', 'ProductsController@statusChange')->name('productChangeStatus');
    Route::post('/products/status-recommend', 'ProductsController@recommendChange')->name('productRecommend');
    Route::post('/products/show-book-count', 'ProductsController@changeBookCount')->name('product.changeBookCount');
    Route::post('/products/is-published', 'ProductsController@changeIsPublish')->name('product.isPublishStatus');
    Route::post('/products/is-show-home', 'ProductsController@showHome')->name('product.showHome');
    Route::post('/products/updateSortValue', 'ProductsController@updateSortValue')->name('product.updateSortValue');
    Route::post('/products/updateRecommendSortValue', 'ProductsController@updateRecommendSortValue')->name('product.updateRecommendSortValue');
    Route::post('/products/removeImg', 'ProductsController@removeImg');

    Route::resource('q-dollor-rebate', 'QDollorRebateController');
    Route::post('/q-dollor-rebate/getData', 'QDollorRebateController@getData');
    Route::post('/q-dollor-rebate/status-change', 'QDollorRebateController@statusChange')->name('qDollorChangeStatus');

    Route::resource('free-gift', 'FreeGiftController');
    Route::post('/free-gift/getData', 'FreeGiftController@getData');
    Route::post('/free-gift/status-change', 'FreeGiftController@statusChange')->name('freeGiftChangeStatus');

    Route::resource('merchant-coupon', 'MerchantCouponController');
    Route::post('/merchant-coupon/getData', 'MerchantCouponController@getData');
    Route::post('/merchant-coupon/status-change', 'MerchantCouponController@statusChange')->name('merchantChangeStatus');

    Route::resource('promotion-campaign', 'PromotionCampaignController');
    Route::post('/promotion-campaign/getData', 'PromotionCampaignController@getData');
    Route::post('/promotion-campaign/status-change', 'PromotionCampaignController@statusChange')->name('promotionChangeStatus');

    Route::resource('promotion-category', 'PromotionCategoryController');
    Route::post('/promotion-category/getData', 'PromotionCategoryController@getData');
    Route::post('/promotion-category/status-change', 'PromotionCategoryController@statusChange')->name('promotionCategoryChangeStatus');
    Route::get('/promotion-category-auto-translate', 'PromotionCategoryController@promotion_category_translate');

    Route::resource('on-sale', 'OnSaleController');
    Route::post('/on-sale/getData', 'OnSaleController@getData');
    Route::post('/on-sale/status-change', 'OnSaleController@statusChange')->name('onSaleChangeStatus');
    Route::get('product-categories', 'AdminController@productCate')->name('product-categories');
    Route::get('product-sub-categories', 'AdminController@productSubCate')->name('product-sub-categories');
    Route::get('product-data', 'AdminController@productData')->name('product-data');
    Route::get('merchant-data', 'AdminController@merchantData')->name('merchant-data');

    Route::resource('sale-category', 'SaleCategoryController');
    Route::post('/sale-category/getData', 'SaleCategoryController@getData');
    Route::post('/sale-category/status-change', 'SaleCategoryController@statusChange')->name('saleCategoryChangeStatus');
    Route::get('/sale-category-auto-translate', 'SaleCategoryController@sale_category_translate');

    Route::resource('product-image', 'ProductImageController');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CategoryController
    |--------------------------------------------------------------------------
    */
    Route::resource('category', 'CategoryController');
    Route::post('/category/getData', 'CategoryController@getData');
    Route::post('/category/status-change', 'CategoryController@statusChange')->name('categoryChangeStatus');
    Route::get('category-auto-translate', 'CategoryController@category_translate');
    Route::post('get-category-image', 'CategoryController@categoryImage')->name('admin.category.images');
    Route::post('get-category-image-m', 'CategoryController@categoryImageM')->name('admin.category.images.mobile');


    /*
    |--------------------------------------------------------------------------
    | This is the route for SubCategoryController
    |--------------------------------------------------------------------------
    */
    Route::resource('sub-category', 'SubCategoryController');
    Route::post('/sub-category/getData', 'SubCategoryController@getData');
    Route::post('/sub-category/status-change', 'SubCategoryController@statusChange')->name('subCategoryStatus');
    Route::get('sub-category-auto-translate', 'SubCategoryController@sub_category_translate');
    Route::get('subCate', 'SubCategoryController@subCate');
    Route::post('/sub-category/sort-by', 'SubCategoryController@sortBy')->name('subcate.sortBy');

    /*
    |--------------------------------------------------------------------------
    | This is the route for MainOptionalItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('main-optional-item', 'MainOptionalItemController');
    Route::post('/main-optional-item/getData', 'MainOptionalItemController@getData');
    Route::post('/main-optional-item/status-change', 'MainOptionalItemController@statusChange')->name('mainOptionalItemChangeStatus');
    Route::get('/main-optional-item-auto-translate', 'MainOptionalItemController@main_optional_item_translate');

    /*
    |--------------------------------------------------------------------------
    | This is the route for MainOptionalItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('optional-item', 'OptionalItemController');
    Route::post('/optional-item/getData', 'OptionalItemController@getData');
    Route::post('/optional-item/status-change', 'OptionalItemController@statusChange')->name('optionalItemChangeStatus');
    Route::get('/optional-item-auto-translate', 'OptionalItemController@optional_item_translate');

    /*
    |--------------------------------------------------------------------------
    | This is the route for RecipientController
    |--------------------------------------------------------------------------
    */
    Route::resource('recipient', 'RecipientController');
    Route::post('/recipient/getData', 'RecipientController@getData');

    /*
    |--------------------------------------------------------------------------
    | This is the route for AddOnItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('add-on-item', 'AddOnItemController');
    Route::post('/add-on-item/getData', 'AddOnItemController@getData');
    Route::post('/add-on-item/status-change', 'AddOnItemController@statusChange')->name('addOnItemChangeStatus');
    Route::get('/add-on-item-auto-translate', 'AddOnItemController@add_on_item_translate');

    /*

     |--------------------------------------------------------------------------
    | This is the route for PaymentTypeController
    |--------------------------------------------------------------------------
    */
    Route::resource('payment-type', 'PaymentTypeController');
    Route::post('/payment-type/getData', 'PaymentTypeController@getData');
    Route::post('/payment-type/status-change', 'PaymentTypeController@statusChange')->name('paymentStatusChange');
    /*
    |--------------------------------------------------------------------------
    | This is the route for RecommendTagsController
    |--------------------------------------------------------------------------
    */
    Route::resource('recommend-tags', 'RecommendTagsController');
    Route::post('/recommend-tags/getData', 'RecommendTagsController@getData');
    Route::post('/recommend-tags/status-change', 'RecommendTagsController@statusChange')->name('recommendChangeStatus');
    Route::get('/recommend-tag-auto-translate', 'RecommendTagsController@recommend_tag_translate');

    Route::resource('/dose-tag', 'DoseTagController');
    Route::post('/dose-tag/getData', 'DoseTagController@getData');
    Route::post('/dose-tag/status-change', 'DoseTagController@statusChange')->name('doseTagChangeStatus');
    Route::get('/dose-tag-auto-translate', 'DoseTagController@dose_tag_translate');


    Route::resource('feature-tag', 'FeatureTagController');
    Route::post('/feature-tag/getData', 'FeatureTagController@getData');
    Route::get('/feature-tag-auto-translate', 'FeatureTagController@feature_tag_translate');
    Route::post('/feature-tag/status-change', 'FeatureTagController@statusChange')->name('featureTagChangeStatus');


    Route::resource('price-tag', 'PriceTagController');
    Route::post('/price-tag/getData', 'PriceTagController@getData');
    Route::get('/price-tag-auto-translate', 'PriceTagController@price_tag_translate');
    Route::post('/price-tag/status-change', 'PriceTagController@statusChange')->name('priceChangeStatus');


    Route::resource('time-slot-tag', 'TimeSlotTagController');
    Route::post('/time-slot-tag/getData', 'TimeSlotTagController@getData');
    Route::get('/time-slot-tag-auto-translate', 'TimeSlotTagController@time_slot_tag_translate');
    Route::post('/time-slot-tag/status-change', 'TimeSlotTagController@statusChange')->name('timeSlotChangeStatus');

    Route::resource('vaccine-factory-tag', 'VaccineFactoryTagController');
    Route::post('/vaccine-factory-tag/getData', 'VaccineFactoryTagController@getData');
    Route::get('/vaccine-factory-tag-auto-translate', 'VaccineFactoryTagController@vaccine_factory_tag_translate');
    Route::post('/vaccine-factory-tag/status-change', 'VaccineFactoryTagController@statusChange')->name('vaccineFactoryChangeStatus');

    /*
    |--------------------------------------------------------------------------
    | This is the route for VaccineStockTagController
    |--------------------------------------------------------------------------
    */
    Route::resource('vaccine-stock-tag', 'VaccineStockTagController');
    Route::post('/vaccine-stock-tag/getData', 'VaccineStockTagController@getData');

    Route::resource('highlight-tag', 'HighlightTagController');
    Route::post('/highlight-tag/getData', 'HighlightTagController@getData');
    Route::get('/highlight-tag-auto-translate', 'HighlightTagController@highlight_tag_translate');
    Route::post('/highlight-tag/status-change', 'HighlightTagController@statusChange')->name('highlightChangeStatus');

    Route::resource('key-item-tag', 'KeyItemTagController');
    Route::post('/key-item-tag/getData', 'KeyItemTagController@getData');
    Route::get('/key-item-tag-auto-translate', 'KeyItemTagController@key_item_tag_translate');
    Route::post('/key-item-tag/status-change', 'KeyItemTagController@statusChange')->name('keyItemChangeStatus');

    Route::resource('sub-key-item-tag', 'SubKeyItemTagController');
    Route::post('/sub-key-item-tag/getData', 'SubKeyItemTagController@getData');
    Route::get('/sub-key-item-tag-auto-translate', 'SubKeyItemTagController@sub_key_item_tag_translate');
    Route::post('/sub-key-item-tag/status-change', 'SubKeyItemTagController@statusChange')->name('subKeyItemChangeStatus');

    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@update');
    Route::get('/contact-auto-translate', 'ContactController@contact_translate');

    Route::resource('contact-service', 'ContactServiceController');
    Route::post('/contact-service/getData', 'ContactServiceController@getData');
    Route::get('/contact-service-auto-translate', 'ContactServiceController@contact_service_translate');
    Route::post('/contact-service/status-change', 'ContactServiceController@statusChange')->name('contactServiceChangeStatus');

    Route::resource('quick-link', 'QuickLinkController');
    Route::post('/quick-link/getData', 'QuickLinkController@getData');
    Route::post('/quick-link/status-change', 'QuickLinkController@statusChange')->name('quickLinkChangeStatus');

    Route::resource('packages', 'PackagesController');
    Route::post('/packages/getData', 'PackagesController@getData');
    Route::post('/packages/status-change', 'PackagesController@statusChange')->name('packageChangeStatus');
    Route::get('/package-translate', 'PackagesController@package_translate');

    Route::resource('best-price', 'BestPriceController');
    Route::post('get-best-price-detail', 'BestPriceController@getBestPrice')->name('admin.best-price-detail');

    Route::resource('partnership', 'PartnershipController');
    Route::post('get-partnership-help', 'PartnershipController@getPartnershiphelp')->name('admin.partnership-help');
    Route::post('get-partnership-detail', 'PartnershipController@getPartnershipdetail')->name('admin.partnership-detail');

    /*
    |--------------------------------------------------------------------------
    | This is the route for PromoCodeController
    |--------------------------------------------------------------------------
    */
    Route::resource('promo-code', 'PromoCodeController');
    Route::post('/promo-code/getData', 'PromoCodeController@getData');
    Route::post('/promo-code/status-change', 'PromoCodeController@statusChange')->name('promoCodeChangeStatus');
    Route::get('/promocode-auto-translate', 'PromoCodeController@promocodeTranslate');

    /*
    |--------------------------------------------------------------------------
    | This is the route for SupplementaryController
    |--------------------------------------------------------------------------
    */
    Route::resource('supplementary', 'SupplementaryController');
    Route::post('/supplementary/getData', 'SupplementaryController@getData');
    Route::post('/supplementary/status-change', 'SupplementaryController@statusChange')->name('supplementaryChangeStatus');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CarrierController
    |--------------------------------------------------------------------------
    */
    Route::resource('carrier', 'CarrierController');
    Route::post('carrier/getData', 'CarrierController@getData');
    Route::post('/carrier/status-change', 'CarrierController@statusChange')->name('carrierStatus');

    /*
     */
    Route::resource('carrier-page', 'CarrierPageController');
    Route::post('carrier-page/getData', 'CarrierPageController@getData');
    Route::post('/carrier-page/status-change', 'CarrierPageController@statusChange')->name('carrierPagesStatus');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CarrierDepartmentController
    |--------------------------------------------------------------------------
    */
    Route::resource('carrier-department', 'CarrierDepartmentController');
    Route::post('/carrier-department/getData', 'CarrierDepartmentController@getData');
    Route::get('/carrier-department-auto-translate', 'CarrierDepartmentController@carrierTranslate');
    Route::post('/carrier-department/status-change', 'CarrierDepartmentController@statusChange')->name('carrierDepartmentStatus');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CheckUpItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('check-up-item', 'CheckUpItemController');
    Route::post('/check-up-item/getData', 'CheckUpItemController@getData');
    Route::post('/check-up-item/status-change', 'CheckUpItemController@statusChange')->name('checkUpItemStatus');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CheckUpGroupController
    |--------------------------------------------------------------------------
    */
    Route::resource('check-up-group', 'CheckUpGroupController');
    Route::post('/check-up-group/getData', 'CheckUpGroupController@getData');
    Route::post('/check-up-group/status-change', 'CheckUpGroupController@statusChange')->name('checkUpGroupStatus');
    Route::get('/checkup-group/translate', 'CheckUpGroupController@checkup_up_translate');



    /*
    |--------------------------------------------------------------------------
    | This is the route for CheckUpTypeController
    |--------------------------------------------------------------------------
    */
    Route::resource('check-up-type', 'CheckUpTypeController');
    Route::post('/check-up-type/getData', 'CheckUpTypeController@getData');
    Route::post('/check-up-type/status-change', 'CheckUpTypeController@statusChange')->name('checkUpTypeStatus');
    Route::get('/checkup-type-translate', 'CheckUpTypeController@checkup_type_translate');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CheckUpTableController
    |--------------------------------------------------------------------------
    */
    Route::resource('check-up-table', 'CheckUpTableController');
    Route::post('/check-up-table/getData', 'CheckUpTableController@getData');
    Route::post('/check-up-table/status-change', 'CheckUpTableController@statusChange')->name('checkUpTableStatus');
    Route::get('/checkup-table-translate', 'CheckUpTableController@checkup_table_translate');
    Route::get('/destory-gp-item', 'CheckUpTableController@destorygp');

    Route::post('/check-up-table/getCheckUpType', 'CheckUpTableController@getCheckUpType');
    Route::post('/check-up-table/getCheckUpGroup', 'CheckUpTableController@getCheckUpGroup');

    Route::post('check-up-table/save-check-up-table-data/{id}', 'CheckUpTableController@saveCheckUpTableData');
    Route::patch('check-up-table/edit-check-up-table-data/{id}', 'CheckUpTableController@updateCheckUpTableData');

    // Route::resource('choose-mediq', 'ChooseMediqController');
    Route::get('choose-mediq', 'ChooseMediqController@index');
    Route::post('choose-mediq', 'ChooseMediqController@update');
    Route::get('/choose-mediq-translate', 'ChooseMediqController@choose_mediq_translate');


    Route::resource('service-solution', 'ServiceSolutionController');
    Route::post('/service-solution/getData', 'ServiceSolutionController@getData');
    Route::post('/service-solution/status-change', 'ServiceSolutionController@statusChange')->name('serviceSolutionChangeStatus');
    Route::post('get-checking-item-form', 'ServiceSolutionController@checkingItemForm')->name('admin.get-checking-item-form');
    Route::get('/service-solution-auto-translate', 'ServiceSolutionController@service_solution_translate');

    Route::resource('home-checking-item', 'HomeCheckingItemController');

    /*
    |--------------------------------------------------------------------------
    | This is the route for AddOnItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('coupon-banner', 'CouponBannerController');
    Route::post('/coupon-banner/getData', 'CouponBannerController@getData');
    Route::post('/coupon-banner/status-change', 'CouponBannerController@couponBannerChangeStatus')->name('couponBannerChangeStatus');
    Route::get('/coupon-banner-auto-translate', 'CouponBannerController@couponBannerTranslate');
    Route::get('/coupon-image', 'CouponBannerController@couponImage');
    Route::post('/update-coupon-image', 'CouponBannerController@couponImageUpdate');

    Route::resource('orders', 'OrderController');
    Route::post('/orders/getData', 'OrderController@getData');
    Route::post('orders-save-items-status', 'OrderController@saveOrderItemStatus')->name('order.saveOrderItemStatus');
    Route::post('orders-save-payment-status', 'OrderController@savePaymentStatus')->name('order.savePaymentStatus');
    Route::post('orders-change-optional-items', 'OrderController@changeOrderOptionalItems')->name('order.changeOrderOptionalItems');

    Route::get('enquiry-product-list', [OrderController::class, 'enquiryProduct'])->name('enquiry.enquiryProduct');
    Route::post('enquiry-product/getData', [OrderController::class, 'getEnquiryData'])->name('enquiry.getEnquiryData');
    Route::get('enquiry-product-detail/{id}', [OrderController::class, 'enquiryProductShow'])->name('enquiry.enquiryProductShow');

    Route::get('orders/download/{id}', 'OrderController@download')->name('order.details.download');

    Route::resource('office-info', 'OfficeInfoController');
    Route::post('/office-info/getData', [OfficeInfoController::class, 'getData']);


    Route::resource('bank-info', 'BankInfoController');
    Route::post('/bank-info/getData', [BankInfoController::class, 'getData']);

    Route::resource('contact-us', 'ContactUsController');
    Route::get('customer-list', [ContactUsController::class, 'getCustomerList'])->name('contact.list');
    Route::post('/contact-us/getCustomerData', [ContactUsController::class, 'getCustomerData'])->name('contact.data');


    Route::get('quick-start-guide', 'QuickStartGuideController@index'   )->name('admin.quick-start');
    Route::post('quick-start-guide', 'QuickStartGuideController@update')->name('admin.quick-start-guide.update');
    Route::post('get-quick-start-guide-detail', 'QuickStartGuideController@getQuickStartGuide')->name('admin.quick-start-guide');


    Route::get('booking-process', 'BookingProcessController@index')->name('admin.booking.process');
    Route::post('booking-process', 'BookingProcessController@update')->name('admin.booking-process.update');
    Route::post('get-booking-process', 'BookingProcessController@getQuickStartGuide')->name('admin.booking.process.detail');
    /*
    |--------------------------------------------------------------------------
    | This is the route for AddOnItemController
    |--------------------------------------------------------------------------
    */
    Route::resource('customnotification', 'CustomNotificationController');
    Route::post('/customnotification/getData', 'CustomNotificationController@getData');
    Route::post('/customnotification/enable-selection-change', 'CustomNotificationController@statusChange')->name('customNotificationChangeEnableSelection');

    Route::resource('notificationtype', 'NotificationTypeController');
    Route::post('/notificationtype/getData', 'NotificationTypeController@getData');

    Route::resource('relationshiptype', 'RelationshipTypeController');
    Route::post('/relationshiptype/getData', 'RelationshipTypeController@getData');

    Route::resource('agegroup', 'AgeGroupController');
    Route::post('/agegroup/getData', 'AgeGroupController@getData');

    Route::resource('vaccine', 'VaccineController');
    Route::post('/vaccine/getData', 'VaccineController@getData');

    Route::resource('disease', 'DiseaseController');
    Route::post('/disease/getData', 'DiseaseController@getData');

    Route::resource('allergicdisease', 'AllergicDiseaseController');
    Route::post('/allergicdisease/getData', 'AllergicDiseaseController@getData');

    Route::resource('maintypealcohol', 'MainTypeAlcoholController');
    Route::post('/maintypealcohol/getData', 'MainTypeAlcoholController@getData');

    Route::resource('amountofalcoholdrinking', 'AmountOfAlcoholDrinkingController');
    Route::post('/amountofalcoholdrinking/getData', 'AmountOfAlcoholDrinkingController@getData');

    Route::resource('bloodtype', 'BloodTypeController');
    Route::post('/bloodtype/getData', 'BloodTypeController@getData');

    Route::resource('maritalstatus', 'MaritalStatusController');
    Route::post('/maritalstatus/getData', 'MaritalStatusController@getData');

    Route::resource('seo-page', 'SeoPageController');
    Route::post('/seo-page/getData', 'SeoPageController@getData');
    Route::post('/seo-page/status-change', 'SeoPageController@statusChange')->name('seo.changeStatus');
    Route::get('/seo-page-auto-translate', 'SeoPageController@seo_translate');
});

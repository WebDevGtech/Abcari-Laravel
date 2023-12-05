<?php

use App\Http\Controllers\BarAdmin\AppControlController;
use Illuminate\Support\Facades\Route;
//Dash Board Controllers
use App\Http\Controllers\SuperAdmin\DashBoardController as SuperAdminDashBoard;
use App\Http\Controllers\CountryAdmin\DashBoardController as CountryAdminDashBoard;
use App\Http\Controllers\BarAdmin\DashBoardController as BarAdminDashBoard;
//Bar Admin Controllers
use App\Http\Controllers\BarAdmin\TaxTypeController;
use App\Http\Controllers\BarAdmin\CategoryController;
use App\Http\Controllers\BarAdmin\ProductController;
use App\Http\Controllers\BarAdmin\OrderController;
use App\Http\Controllers\BarAdmin\OrderInvoiceController;
use App\Http\Controllers\BarAdmin\BarTimeController;
use App\Http\Controllers\BarAdmin\OfferController;
use App\Http\Controllers\BarAdmin\RatingReviewController;
use App\Http\Controllers\BarAdmin\TransactionController;
use App\Http\Controllers\BarAdmin\RewardPointController;
use App\Http\Controllers\BarAdmin\RemoveRewardController;
use App\Http\Controllers\BarAdmin\SettingController;
use App\Http\Controllers\BarAdmin\ReportController;
use App\Http\Controllers\BarAdmin\BarSettingController;
use App\Http\Controllers\BarAdmin\BarProfileController;
use App\Http\Controllers\BarBucketPointController as ControllersBarBucketPointController;
use App\Http\Controllers\BarAdmin\BarSiteSettingController;
//Country Admin Controllers
use App\Http\Controllers\CountryAdmin\BarCategoryController;
use App\Http\Controllers\CountryAdmin\BarServiceController;
use App\Http\Controllers\CountryAdmin\BarTypeController;
use App\Http\Controllers\CountryAdmin\BarTieUpController;
use App\Http\Controllers\CountryAdmin\CityController;
use App\Http\Controllers\CountryAdmin\ZoneController;
use App\Http\Controllers\CountryAdmin\OfferController as CountryBanner;

use App\Http\Controllers\CountryAdmin\PostCodeController;
use App\Http\Controllers\CountryAdmin\ProductCategoryController;
use App\Http\Controllers\CountryAdmin\ProductSubCategoryController;
use App\Http\Controllers\CountryAdmin\VariationTypeController;
use App\Http\Controllers\CountryAdmin\AddBaradminController;
use App\Http\Controllers\CountryAdmin\ViewBaradminsController;
use  App\Http\Controllers\CountryAdmin\ProductSettingsController;
use App\Http\Controllers\CountryAdmin\PaymentGatewayController;
use App\Http\Controllers\CountryAdmin\OrderManagementController;
use App\Http\Controllers\CountryAdmin\ViewBarRestaurantController;
use App\Http\Controllers\CountryAdmin\AddBarRestaurantController;
use App\Http\Controllers\CountryAdmin\CountryController;
use App\Http\Controllers\CountryAdmin\BarBucketController;
use App\Http\Controllers\CountryAdmin\BarBucketPointController;
use App\Http\Controllers\CountryAdmin\ProductVariationController;
use App\Http\Controllers\CountryAdmin\CountryTaxTypeController;


use App\Http\Controllers\CountryAdmin\CountryTransactionController;
use App\Http\Controllers\CountryAdmin\CountryRewardController;
use App\Http\Controllers\CountryAdmin\CountryBarReportController;
use App\Http\Controllers\CountryAdmin\CountryLiquorReportController;
use App\Http\Controllers\CountryAdmin\CountryFoodReportController;

use App\Http\Controllers\CountryAdmin\CountryProfileController;

use App\Http\Controllers\CountryAdmin\CountrySiteSettingController;

//Super Admin Controllers
use App\Http\Controllers\SuperAdmin\AddAdminController;
use App\Http\Controllers\SuperAdmin\CountryAdminController;
use App\Http\Controllers\SuperAdmin\SuperAdminCountryController;
use App\Http\Controllers\SuperAdmin\SuperAdminzoneController;
use App\Http\Controllers\SuperAdmin\BarBucketSuperAdminController;
use App\Http\Controllers\SuperAdmin\BarCategorySuperAdminController;
use App\Http\Controllers\SuperAdmin\BarServiceSuperAdminController;
use App\Http\Controllers\SuperAdmin\BarTieUpSuperAdminController;
use App\Http\Controllers\SuperAdmin\BarBucketPointSuperAdminController;
use App\Http\Controllers\SuperAdmin\SuperAdminCityController;
use App\Http\Controllers\SuperAdmin\SuperAdminPostCodeController;
use App\Http\Controllers\SuperAdmin\SuperAdminProductCategoryController;
use App\Http\Controllers\SuperAdmin\SuperAdminProductSubCategoryController;
use App\Http\Controllers\SuperAdmin\SuperAdminProductVariationController;
use App\Http\Controllers\SuperAdmin\SuperAdminVariationTypeController;
use App\Http\Controllers\SuperAdmin\SuperAdminPaymentGatewayController;
use App\Http\Controllers\SuperAdmin\SuperAdminOrderStatusController;
use App\Http\Controllers\SuperAdmin\SiteSettingController;
use App\Http\Controllers\SuperAdmin\RuleController;
use App\Http\Controllers\SuperAdmin\VariationTypeController as VariationType;
use App\Http\Controllers\SuperAdmin\TransactionController as Transaction;
use App\Http\Controllers\SuperAdmin\RewardController;
use App\Http\Controllers\SuperAdmin\BarReportController;
use App\Http\Controllers\SuperAdmin\CountryReportController;
use App\Http\Controllers\SuperAdmin\LiquorReportController;
use App\Http\Controllers\SuperAdmin\FoodReportController;

use App\Http\Controllers\SuperAdmin\SuperAdminProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('lang/home', 'LangController@index');

Route::get('lang/change', 'LangController@change')->name('changeLang');
Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'super-admin', 'middleware' => [
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
    'superAdmin'
], 'namespace' => 'SuperAdmin'], function () {
    Route::get('/dashboard', [SuperAdminDashBoard::class, 'index'])->name('super-admin-dashboard');
});

Route::group(['prefix' => 'country-admin', 'middleware' => [
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
    'countryAdmin'
], 'namespace' => 'CountryAdmin'], function () {


});


Route::group(['prefix' => 'bar-admin', 'middleware' => [
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
    'barAdmin'
], 'namespace' => 'BarAdmin'], function () {
    Route::get('/dashboard', [BarAdminDashBoard::class, 'index'])->name('bar-admin-dashboard');
    Route::get('/change_password', [BarAdminDashBoard::class, 'changePassword'])->name('changePassword');

    Route::get('/product/add-product', [ProductController::class, 'addproduct'])->name('add-product');
    Route::get('/product/view-product', [ProductController::class, 'viewproduct'])->name('view-product');
    //order
    Route::get('/order', [OrderController::class, 'order'])->name('bar-order');
   // Route::get('/order/new-order', [OrderController::class, 'new_order'])->name('new_order');
    Route::get('/order/prepare-order', [OrderController::class, 'prepare_order'])->name('bar-prepare-order');
    Route::get('/order/ready-to-serve', [OrderController::class, 'ready_to_serve'])->name('bar-ready-to-serve');
    Route::get('/order/served-order', [OrderController::class, 'served_order'])->name('bar-served-order');
    Route::get('/order/cancel-order', [OrderController::class, 'cancel_order'])->name('bar-cancel-order');
    //orderinvoice
    Route::get('/orderinvoice', [OrderInvoiceController::class, 'orderinvoice'])->name('order-invoice');
    Route::get('/orderinvoice/approved-invoice', [OrderInvoiceController::class, 'approved_orderinvoice'])->name('approved-order-invoice');
    Route::get('/orderinvoice/cancel-invoice', [OrderInvoiceController::class, 'cancel_orderinvoice'])->name('cancel-order-invoice');




    Route::get('/bar-time/happy-hour',[BarTimeController::class,'happyhour'])->name('happy-hour');
    Route::get('/bar-time/peak-hour',[BarTimeController::class,'peakhour'])->name('peak-hour');
 //   Route::get('/offer/banner',[OfferController::class,'banner'])->name('banner');

    Route::get('/offer/offer',[OfferController::class,'offer'])->name('offer');
    Route::get('/offer/combo',[OfferController::class,'combo'])->name('combo');
    Route::get('/offer/coupon',[OfferController::class,'coupon'])->name('coupon');
    Route::get('/offer/banner',[OfferController::class,'banner'])->name('banner');
    Route::get('/rating-review',[RatingReviewController::class,'rating'])->name('rating-review');
    Route::get('/transaction',[TransactionController::class,'transaction'])->name('transaction');
    Route::get('/reward-points/reward-transaction',[RewardPointController::class,'rewardtransaction'])->name('reward-transaction');
   

    // Route::get('/app-control',[SettingController::class,'appcontrol'])->name('app-control');
    // Route::get('/app-setting',[SettingController::class,'appsetting'])->name('app-setting');
    Route::get('/settings/payment-gateway',[SettingController::class,'paymentgateway'])->name('bar-payment-gateway');
    Route::get('/settings/tax-type',[SettingController::class,'taxtype'])->name('tax-type');
    Route::get('/settings/push-notification',[SettingController::class,'pushnotification'])->name('push-notification');
    Route::get('/report/total-sale',[ReportController::class,'totalsale'])->name('total-sale');
    Route::get('/report/brand',[ReportController::class,'brand'])->name('brand');
    Route::get('/report/liquor',[ReportController::class,'liquor'])->name('liquor');
    Route::get('/report/food',[ReportController::class,'food'])->name('food');
    Route::get('/bar-setting/rules',[BarSettingController::class,'rule'])->name('rules');

    Route::get('/bar-setting/waiter-details',[BarSettingController::class,'waiterdetail'])->name('waiter-details');
    Route::get('/bar-profile/profile',[BarProfileController::class,'barprofile'])->name('bar-profile');
    Route::get('/checking', function () {  return view('checking');});

    Route::get('/bar_sitesetting',[BarSiteSettingController::class,'sitesetting'])->name('bar_sitesetting');

    //order view
    Route::get('/order-invoice/order-invoice-view/{id}',[OrderInvoiceController::class,'order_invoice_view'])->name('order-invoice-view');
}
);

    // Route::get('/menu/category',[CategoryController::class,'index'])->name('menu-category');
    // Route::get('/sub-category',[CategoryController::class,'subCategory'])->name('sub-category');

Route::group(['prefix' => 'country-admin', 'middleware' => [
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
    'countryAdmin'
], 'namespace' => 'CountryAdmin'], function () {
    Route::get('/dashboard', [CountryAdminDashBoard::class, 'index'])->name('country-admin-dashboard');
    Route::get('/add-bar-admin',[AddBaradminController::class,'addbaradmin'])->name('add-bar-admin');
    Route::get('/view-bar-admins',[ViewBaradminsController::class,'viewbaradmin'])->name('view-bar-admins');
    Route::get('/bar-settings/bar-bucket',[BarBucketController::class,'barbucket'])->name('bar-bucket');
    Route::get('/bar-settings/bar-category',[BarCategoryController::class,'barcategory'])->name('bar-category');
    Route::get('/bar-settings/bar-service',[BarServiceController::class,'barservice'])->name('bar-service');
    Route::get('/bar-settings/rating',[BarServiceController::class,'rating'])->name('bar-rating');
    Route::get('/bar-settings/bar-type',[BarTypeController::class,'bartype'])->name('bar-type');
    Route::get('/offer/banner',[CountryBanner::class,'banner'])->name('banner');
    // Route::get('/offer/offer',[OfferController::class,'offer'])->name('offer');
    // Route::get('/offer/combo',[OfferController::class,'combo'])->name('combo');
    // Route::get('/offer/coupon',[OfferController::class,'coupon'])->name('coupon');
    Route::get('/bar-settings/bar-tie-up',[BarTieUpController::class,'bartieup'])->name('bar-tie-up');
    Route::get('/bar-settings/bar-bucket-point',[BarBucketPointController::class,'barbucketpoint'])->name('bar-bucket-point');
    Route::get('/places/add-zone',[ZoneController::class,'zone'])->name('add-zone');
    Route::get('/places/add-city',[CityController::class,'city'])->name('city');
    Route::get('/places/add-postcode',[PostCodeController::class,'postcode'])->name('postcode');
    Route::get('/product-settings',[ProductSettingsController::class,'productsettings'])->name('product-settings');
    Route::get('/product/category',[ProductCategoryController::class,'category'])->name('product-category');
    Route::get('/product/brand',[ProductCategoryController::class,'brand'])->name('product-brand');

    Route::get('/product/sub-category',[ProductSubCategoryController::class,'subcategory'])->name('product-sub-category');
    Route::get('/product/variation',[ProductVariationController::class,'productvariation'])->name('product-variation');
    Route::get('/product/variation-type',[VariationTypeController::class,'variation'])->name('variation-type');
    Route::get('/settings/payment-gateway',[PaymentGatewayController::class,'paymentgateway'])->name('payment-gateway');
    Route::get('/settings/order-status',[OrderManagementController::class,'ordermanagement'])->name('order-status');
    Route::get('/bar-restaurant/add-bar-restaurant',[AddBarRestaurantController::class,'addbarrestaurant'])->name('add-bar-restaurant');
    Route::get('/bar-restaurant/edit-bar-restaurant/{id}',[AddBarRestaurantController::class,'editbarrestaurant'])->name('edit-bar-restaurant');
    Route::get('/bar-restaurant/view-bar-restaurant',[ViewBarRestaurantController::class,'viewbarrestaurant'])->name('view-bar-restaurant');
    Route::get('/add-country',[CountryController::class,'addcountry'])->name('add-country');
    Route::get('/settings/country-tax-type',[CountryTaxTypeController::class,'taxtype'])->name('countryadmin-tax-type');

    Route::get('/transaction-report/transaction',[CountryTransactionController::class,'index'])->name('countryadmin-transaction');
    Route::get('/transaction-report/reward',[CountryRewardController::class,'index'])->name('countryadmin-reward');

    Route::get('/report/bar',[CountryBarReportController::class,'index'])->name('countryadmin-bar-report');
    // Route::get('/report/country',[CountryReportController::class,'index'])->name('countryadmin-country-report');
    Route::get('/report/liquor',[CountryLiquorReportController::class,'index'])->name('countryadmin-liquor-report');
    Route::get('/report/food',[CountryFoodReportController::class,'index'])->name('countryadmin-food-report');

    Route::get('/country-profile/profile',[CountryProfileController::class,'index'])->name('country-profile');
    Route::get('/country_sitesetting',[CountrySiteSettingController::class,'sitesetting'])->name('country_sitesetting');



});

// super admin

Route::group(['prefix' => 'super-admin', 'middleware' => [
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
    'superAdmin'
], 'namespace' => 'SuperAdmin'], function () {
    Route::get('/dashboard', [SuperAdminDashBoard::class, 'index'])->name('super-admin-dashboard');
    Route::get('/add-admin',[AddAdminController::class,'addadmin'])->name('add-admin');
    Route::get('/users/country-admin',[CountryAdminController::class,'countryadmin'])->name('country-admin');
    Route::get('/places/add-country',[SuperAdminCountryController::class,'country'])->name('superadmin-add-country');
    Route::get('/places/add-city',[SuperAdminCityController::class,'addcity'])->name('add-city');
    Route::get('/places/add-post-code',[SuperAdminPostCodeController::class,'addpostcode'])->name('add-post-code');
    Route::get('/places/add-zone',[SuperAdminzoneController::class,'zone'])->name('superadmin-add-zone');
    Route::get('/bar-settings/bar-bucket',[BarBucketSuperAdminController::class,'barbucket'])->name('superadmin-bar-bucket');
    Route::get('/bar-settings/bar-category',[BarCategorySuperAdminController::class,'category'])->name('superadmin-bar-category');
    Route::get('/bar-settings/bar-service',[BarServiceSuperAdminController::class,'service'])->name('superadmin-bar-service');
    Route::get('/bar-settings/bar-tie-up',[BarTieUpSuperAdminController::class,'tieup'])->name('superadmin-bar-tie-up');
    Route::get('/bar-settings/bucket-reward-point',[BarBucketPointSuperAdminController::class,'bucketpoint'])->name('superadmin-bucket-reward-point');
    Route::get('/product/category',[SuperAdminProductCategoryController::class,'addcategory'])->name('superadmin-product-category');
    Route::get('/product/sub-category',[SuperAdminProductSubCategoryController::class,'addsubcategory'])->name('superadmin-product-sub-category');
    Route::get('/product/variation',[SuperAdminProductVariationController::class,'addproductvariation'])->name('superadmin-product-variation');
    Route::get('/product/variation-type',[SuperAdminVariationTypeController::class,'addvariationtype'])->name('superadmin-variation-type');
    Route::get('/settings/payment-gateway',[SuperAdminPaymentGatewayController::class,'paymentgateway'])->name('superadmin-payment-gateway');

    Route::get('/settings/order-status',[SuperAdminOrderStatusController::class,'orderstatus','orderstatus'])->name('superadmin-order-status');
    Route::get('/site-setting',[SiteSettingController::class,'sitesetting'])->name('site-setting');
    Route::get('/settings/rules',[RuleController::class,'index'])->name('superadmin-rules');
    Route::get('/settings/variation',[VariationType::class,'index'])->name('superadmin-variation-type');

    Route::get('/transaction-report/transaction',[Transaction::class,'index'])->name('superadmin-transaction');
    Route::get('/transaction-report/reward',[RewardController::class,'index'])->name('superadmin-reward');
    Route::get('/transaction-report/remove-reward',[RemoveRewardController::class,'removereward'])->name('remove-reward');
    Route::get('/report/bar',[BarReportController::class,'index'])->name('superadmin-bar-report');
    Route::get('/report/country',[CountryReportController::class,'index'])->name('superadmin-country-report');
    Route::get('/report/liquor',[LiquorReportController::class,'index'])->name('superadmin-liquor-report');
    Route::get('/report/food',[FoodReportController::class,'index'])->name('superadmin-food-report');

    Route::get('/superadmin-profile/profile',[SuperAdminProfileController::class,'index'])->name('superadmin-profile');
});

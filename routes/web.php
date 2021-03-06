<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ModerationAdvertsController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('set.locale')->group(function () {
    Route::get('/test{language}', [\App\Http\Controllers\SetLocaleController::class, 'setLocal'])->name('test');
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'main'])->name('home');
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::post('/register-user', [\App\Http\Controllers\AjaxController::class, 'registerUser'])->name('register-user');
    Route::post('/check-login-email', [\App\Http\Controllers\AjaxController::class, 'checkLoginEmail'])->name('check-login-email');
    Route::post('/login-password', [\App\Http\Controllers\AjaxController::class, 'authUser'])->name('login-password');
    Route::get('/email_verification_code/{email_verification_code}', [\App\Http\Controllers\UserController::class, 'emailVerificationCode'])->name('activation_link');
    Route::get('/seller/{user}', [\App\Http\Controllers\CatalogController::class, 'sellerPage'])->name('seller-page');
    Route::post('/subscribe', [\App\Http\Controllers\HomeController::class, 'subscribe'])->name('subscribe');
    Route::post('/unsubscribe', [\App\Http\Controllers\HomeController::class, 'unsubscribe'])->name('unsubscribe');
    Route::get('/status_pay/{order_id}', [\App\Http\Controllers\HomeController::class, 'getStatusPay'])->name('status_pay');
    Route::post('/set_cost', [\App\Http\Controllers\ProfileController::class, 'setTransaction'])->name('set_transaction');
    Route::get('/go_to_liqpay/{order_id}', [\App\Http\Controllers\ProfileController::class, 'goToLiqPay'])->name('go_to_liqpay');
    Route::get('/update_rate', [\App\Http\Controllers\RateController::class, 'update'])->name('update_rate');
    Route::get('/about', [\App\Http\Controllers\HomeController::class, 'getAbout'])->name('about');
    Route::post('/send_about', [\App\Http\Controllers\HomeController::class, 'sendAbout'])->name('send_about');
    Route::get('/set_locale/{lang}', [\App\Http\Controllers\HomeController::class, 'setLocale'])->name('set_locale');
    Route::get('/vip', [\App\Http\Controllers\CatalogController::class, 'getResultForHome'])->name('result_for_home');
    Route::get('/change-status/{status}/{advert}', [ModerationAdvertsController::class, 'changeStatus'])
        ->middleware('can:update,advert')->name('change_status');
    Route::post('/send_ad_email', [\App\Http\Controllers\HomeController::class, 'sendAdEMail'])->name('email_ad');
    Route::get('/set_order_price/{value}', [\App\Http\Controllers\CatalogController::class, 'setOrderPrice']);
    Route::get('/set_order_new/', [\App\Http\Controllers\CatalogController::class, 'setOrderNew']);


    Route::group(['prefix' => 'forgot_password'], function (){
        Route::get('/', [\App\Http\Controllers\PasswordController::class, 'resetPasswordIndex'])->name('forgot_password');
        Route::post('/', [\App\Http\Controllers\PasswordController::class, 'resetPasswordStore'])->name('forgot_password_store');
        Route::get('/token/{token?}', [\App\Http\Controllers\PasswordController::class, 'resetPasswordToken'])->name('forgot_password_token');
        Route::post('/new-password', [\App\Http\Controllers\PasswordController::class, 'saveNewPassword'])->name('save_new_password');
    });

    Route::middleware('auth')->group(function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/settings', [\App\Http\Controllers\ProfileController::class, 'settingsIndex'])->name('profile-settings');
            Route::post('/settings-form', [\App\Http\Controllers\ProfileController::class, 'setBasicSettings'])->name('settings-form');
            Route::get('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileIndex'])->name('editing-profile');
            Route::post('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileForm'])->name('editing-profile-form');
            Route::get('/delete-avatar', [\App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('delete-avatar');
            Route::get('/delete-user', [\App\Http\Controllers\ProfileController::class, 'deleteUser'])->name('delete-user');
            Route::get('/reset-password', [\App\Http\Controllers\ProfileController::class, 'resetPassword'])->name('reset-password');
            Route::get('/my_adverts/', [\App\Http\Controllers\ProfileController::class, 'myAdverts'])->name('my_adverts');
            Route::get('/my_adverts_change/{status}', [\App\Http\Controllers\ProfileController::class, 'myAdvertsChange'])->name('my_adverts_change');
            Route::get('/favorite', [\App\Http\Controllers\ProfileController::class, 'getFavorite'])->name('favorite');
            Route::get('/favorite/{status}', [\App\Http\Controllers\ProfileController::class, 'changeFavorite'])->name('favorite_change');
            Route::get('/favorite/delete/{advert}', [\App\Http\Controllers\ProfileController::class, 'deleteFavorite'])->name('delete_favorite');
            Route::get('/search/delete/{search}', [\App\Http\Controllers\ProfileController::class, 'deleteSearch'])->name('delete_search');
            Route::get('/referral', [\App\Http\Controllers\ProfileController::class, 'referralIndex'])->name('referral');
            Route::get('/payments', [\App\Http\Controllers\ProfileController::class, 'getPayments'])->name('payments');
            Route::post('/set_cost', [\App\Http\Controllers\ProfileController::class, 'setTransaction'])->name('set_transaction');
            Route::post('/upload_avatar', [\App\Http\Controllers\ProfileController::class, 'uploadAvatar'])->name('upload_avatar');
        });
        Route::group(['prefix' =>'submitting'], function() {
            Route::get('/', [\App\Http\Controllers\SubmittingController::class, 'index'])->name('submitting');
            Route::post('/create_draft/', [\App\Http\Controllers\SubmittingController::class, 'createDraft'])->name('submitting.create_draft');
            Route::middleware('can:view,advert')->group(function (){
                Route::middleware('can:update,advert')->group(function () {
                    Route::post('/draft/{advert}', [\App\Http\Controllers\SubmittingController::class, 'editDraft'])->name('submitting.edit_draft');
                    Route::get('/draft/{advert}', [\App\Http\Controllers\SubmittingController::class, 'getDraft'])->name('submitting.get_draft');
                    Route::post('/upload_image/{advert}', [\App\Http\Controllers\SubmittingController::class, 'uploadImage'])->name('submitting.upload_image');
                    Route::get('/buy_vip/{advert}', [\App\Http\Controllers\SubmittingController::class, 'buyVip'])->name('submitting.buy_vip');

                    Route::post('/step4/{advert}', [\App\Http\Controllers\SubmittingController::class, 'getStep4']);
                });
            });
            Route::get('/publish/{advert}', [\App\Http\Controllers\SubmittingController::class, 'publish'])->name('submitting.publish');
            Route::get('/delete_photo/{photo}', [\App\Http\Controllers\SubmittingController::class, 'deletePhoto'])->name('submitting.delete_photo');
        });
        Route::group(['prefix'=>'dialog'], function() {
            Route::get('/{id?}',[\App\Http\Controllers\DialogsController::class,'show'])->name('DialogShow');
            Route::post('/{id?}/messages',[\App\Http\Controllers\DialogsController::class,'sendMessage']);
            Route::get('/{id}/messages',[\App\Http\Controllers\DialogsController::class,'getMessage']);
        });
    });

    Route::group(['prefix' =>'catalog'], function() {
        Route::get('/', [\App\Http\Controllers\CatalogController::class, 'getFilterResult'])->name('catalog');
        Route::get('/save_search', [\App\Http\Controllers\CatalogController::class, 'saveSearch'])->name('catalog.save-search');
        Route::get('/sort/{status}', [\App\Http\Controllers\CatalogController::class, 'sort'])->name('catalog.sort');
        Route::get('/count_results/{type}', [\App\Http\Controllers\CatalogController::class, 'countResults'])->name('catalog.count-results');
        Route::get('/item_page/{advert}', [\App\Http\Controllers\GoodsController::class, 'index'])->name('catalog.item-page');
        Route::get('/item_page/{advert}/getItemDialog', [\App\Http\Controllers\AjaxController::class, 'getLinkToDialog'])->name('getLinkToDialog');
        Route::get('/show_phone/{advert}', [\App\Http\Controllers\GoodsController::class, 'showPhone'])->name('catalog.show_phone');
        Route::get('/item_page_favorite/{advert}/{favorite}', [\App\Http\Controllers\GoodsController::class, 'setFavorite'])->name('catalog.item_page_favorite');
        Route::get('{user}/seller_ads', [\App\Http\Controllers\CatalogController::class, 'sellerAds'])->name('catalog.seller-ads');
        Route::get('{type}/{user}/seller_ads/count_results/', [\App\Http\Controllers\CatalogController::class, 'countResults'])->name('catalog.seller-ads.count-results');
        Route::get('/set_rate/{currency}', [\App\Http\Controllers\CatalogController::class, 'setRate'])->name('catalog.set_rate');

        Route::get('/{search}', [\App\Http\Controllers\CatalogController::class, 'getFilterResult'])->name('catalog-favorite');
    });
    Route::get('/count_results/{type}', [\App\Http\Controllers\CatalogController::class, 'countResults'])->name('home.count-results');

    Route::get('count_pagination/{countPagination?}', [\App\Http\Controllers\CatalogController::class, 'countPagination'])->name('count-pagination');


});

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('managerauth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.show_users');
            Route::get('/create', [\App\Http\Controllers\Admin\UsersController::class, 'showCreateUser'])->name('admin.create_user_form');
            Route::post('/create', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.create_user');
            Route::post('/create', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.create_user');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'showEditUser'])->name('admin.edit_user_form');
            Route::post('/edit/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.edit_user');
        });

        Route::group(['prefix' => 'moderation_adverts'], function () {
            Route::get('/', [ModerationAdvertsController::class, 'index'])->name('admin.moderation_adverts');
            Route::get('/change-status/{status}/{advert}', [ModerationAdvertsController::class, 'changeStatus'])->name('admin.change_status');
            Route::get('/delete_advert/{advert}', [ModerationAdvertsController::class, 'deleteAdvert'])->name('admin.delete_advert');
            Route::get('/item_page/{advert}', [\App\Http\Controllers\GoodsController::class, 'index'])->name('admin.item-page');
        });

        Route::group(['prefix' => 'banner_control'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\BannerController::class, 'index'])->name('admin.banner_control');
            Route::post('/create_banner', [\App\Http\Controllers\Admin\BannerController::class, 'createBanner'])->name('admin.create_banner');
            Route::get('/close_banner/{banner}', [\App\Http\Controllers\Admin\BannerController::class, 'closeBanner'])->name('admin.close_banner');
            Route::get('/delete_banner/{banner}', [\App\Http\Controllers\Admin\BannerController::class, 'deleteBanner'])->name('admin.delete_banner');
        });

        Route::group(['prefix' => 'manage_slider'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.slider');
            Route::post('/upload', [\App\Http\Controllers\Admin\SliderController::class, 'upload'])->name('admin.upload_slider');
            Route::get('/deactivation/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'deactivation'])->name('admin.deactivation_slider');
            Route::get('/activation/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'activation'])->name('admin.activation_slider');
            Route::get('/delete/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'delete'])->name('admin.delete_slider');
        });

        Route::group(['prefix' => 'manage_picture'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\ManagePictureController::class, 'index'])->name('admin.manage_picture');
            Route::post('/upload', [\App\Http\Controllers\Admin\ManagePictureController::class, 'upload'])->name('admin.upload_picture');
        });
        Route::group(['prefix' => 'manage_makers'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\MakersController::class, 'index'])->name('admin.manage_makers');
            Route::post('/upload', [\App\Http\Controllers\Admin\MakersController::class, 'upload'])->name('admin.upload_makers_picture');
            Route::get('/change_status/{status}/{maker}', [\App\Http\Controllers\Admin\MakersController::class, 'changeStatus'])->name('admin.change_status_maker');
            Route::get('/update_maker/{maker}', [\App\Http\Controllers\Admin\MakersController::class, 'updateMakerIndex'])->name('admin.update_maker_index');
            Route::post('/update_maker/{maker}', [\App\Http\Controllers\Admin\MakersController::class, 'updateMaker'])->name('admin.update_maker');
            Route::get('/change_moderation/{status}/{maker}', [\App\Http\Controllers\Admin\MakersController::class, 'setModeration'])->name('admin.change_moderation');
        });

        Route::group(['prefix' => 'links'], function (){
            Route::get('/', [\App\Http\Controllers\Admin\FooterController::class, 'mediaLinksIndex'])->name('admin.footer_index');
            Route::get('/{mediaLink}/status/{status}', [\App\Http\Controllers\Admin\FooterController::class, 'changeStatus'])->name('admin.change_status_link');
            Route::get('/update/{mediaLink}', [\App\Http\Controllers\Admin\FooterController::class, 'updateLinkIndex'])->name('admin.update_links_index');
            Route::post('/update/{mediaLink}', [\App\Http\Controllers\Admin\FooterController::class, 'updateLink'])->name('admin.update_links');
        });

        Route::group(['prefix' => 'data'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\AdminDataController::class, 'index'])->name('admin.data_index');
            Route::get('/change_status_watch_type/{watchType}/{status}', [\App\Http\Controllers\Admin\AdminDataController::class, 'changeStatusWatchType'])->name('admin.change_status_watch_type');
            Route::get('/update_watch_type/{watchType}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateWatchTypeIndex'])->name('admin.update_watch_type_index');
            Route::post('/update_watch_type/{watchType}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateWatchType'])->name('admin.update_watch_type');
            Route::post('/create_watch_type', [\App\Http\Controllers\Admin\AdminDataController::class, 'createWatchType'])->name('admin.create_watch_type');
            Route::get('/delete_watch_type/{watchType}', [\App\Http\Controllers\Admin\AdminDataController::class, 'deleteWatchType'])->name('admin.delete_watch_type');
            Route::get('/change_status_mechanism_type/{mechanismType}/{status}', [\App\Http\Controllers\Admin\AdminDataController::class, 'changeStatusMechanismType'])->name('admin.change_status_mechanism_type');
            Route::get('/update_mechanism_type/{mechanismType}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateMechanismTypeIndex'])->name('admin.update_mechanism_type_index');
            Route::post('/update_mechanism_type/{mechanismType}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateMechanismType'])->name('admin.update_mechanism_type');
            Route::post('/create_mechanism_type', [\App\Http\Controllers\Admin\AdminDataController::class, 'createMechanismType'])->name('admin.create_mechanism_type');
            Route::get('/change_status_delivery_volume/{deliveryVolume}/{status}', [\App\Http\Controllers\Admin\AdminDataController::class, 'changeStatusDeliveryVolume'])->name('admin.change_status_delivery_volume');
            Route::get('/update_delivery_volume/{deliveryVolume}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateDeliveryVolumeIndex'])->name('admin.update_delivery_volume_index');
            Route::post('/update_delivery_volume/{deliveryVolume}', [\App\Http\Controllers\Admin\AdminDataController::class, 'updateDeliveryVolume'])->name('admin.update_delivery_volume');
            Route::post('/create_delivery_volume', [\App\Http\Controllers\Admin\AdminDataController::class, 'createDeliveryVolume'])->name('admin.create_delivery_volume');
            Route::post('/set_count_free_adverts', [\App\Http\Controllers\Admin\AdminDataController::class, 'setCountFreeAdverts'])->name('admin.set_count_free_adverts');
        });

        Route::group(['prefix' => 'pay'], function (){
            Route::post('/set_pay', [\App\Http\Controllers\Admin\ManagePrice::class, 'setPrice'])->name('admin.set_price');
            Route::get('/set_pay', [\App\Http\Controllers\Admin\ManagePrice::class, 'show'])->name('admin.show_pay');
            Route::post('/set_pay_not_vip', [\App\Http\Controllers\Admin\ManagePrice::class, 'setNotVipPrice'])
                ->name('admin.set_nop_vip_price');
        });

    });
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.showlogin');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
});


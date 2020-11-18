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
    Route::get('/test', [\App\Http\Controllers\HomeController::class, 'test']);
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::post('/register-user', [\App\Http\Controllers\AjaxController::class, 'registerUser'])->name('register-user');
    Route::post('/check-login-email', [\App\Http\Controllers\AjaxController::class, 'checkLoginEmail'])->name('check-login-email');
    Route::post('/login-password', [\App\Http\Controllers\AjaxController::class, 'authUser'])->name('login-password');
    Route::get('/reset-password/{email}', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('reset-password');
    Route::get('/email_verification_code/{email_verification_code}', [\App\Http\Controllers\UserController::class, 'emailVerificationCode'])->name('activation_link');
    Route::get('/seller/{user}', [\App\Http\Controllers\CatalogController::class, 'sellerPage'])->name('seller-page');

    Route::group(['prefix' => 'profile'], function () {
        Route::middleware('auth')->group(function () {
            Route::get('/settings', [\App\Http\Controllers\ProfileController::class, 'settingsIndex'])->name('profile-settings');
            Route::post('/settings-form', [\App\Http\Controllers\ProfileController::class, 'setBasicSettings'])->name('settings-form');
            Route::get('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileIndex'])->name('editing-profile');
            Route::post('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileForm'])->name('editing-profile-form');
            Route::get('/delete-avatar', [\App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('delete-avatar');
            Route::get('/delete-user', [\App\Http\Controllers\ProfileController::class, 'deleteUser'])->name('delete-user');
            Route::get('/reset-password', [\App\Http\Controllers\ProfileController::class, 'resetPassword'])->name('reset-password');
            Route::get('/my_adverts/', [\App\Http\Controllers\ProfileController::class, 'myAdverts'])->name('my_adverts');
            Route::get('/my_adverts_change/{status}', [\App\Http\Controllers\ProfileController::class, 'myAdvertsChange'])->name('my_adverts_change');
        });
    });

    Route::group(['prefix' =>'catalog'], function() {
        Route::get('/', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
        Route::get('/filter_json', [\App\Http\Controllers\CatalogController::class, 'filterJson'])->name('catalog.filter-json');
        Route::get('/filter', [\App\Http\Controllers\CatalogController::class, 'filter'])->name('catalog.filter');//todo спитати в Дениса чи достатньо json
        Route::get('/accessory', [\App\Http\Controllers\CatalogController::class, 'indexAccessory'])->name('catalog.accessory');
        Route::get('/spare_parts', [\App\Http\Controllers\CatalogController::class, 'indexSparePart'])->name('catalog.spare-parts');
//        Route::get('{user}/item_page/{advert}', [\App\Http\Controllers\GoodsController::class, 'index'])->name('catalog.item-page');
        Route::get('/item_page/{advert}', [\App\Http\Controllers\GoodsController::class, 'index'])->name('catalog.item-page');
        Route::get('{user}/item_page_favorite/{advert}/{favorite}', [\App\Http\Controllers\GoodsController::class, 'setFavorite'])->name('catalog.item_page_favorite');
        Route::get('{user}/item_page_accessory/{advert}', [\App\Http\Controllers\GoodsController::class,'index'])->name('catalog.item-page-accessory');
        Route::get('{user}/item_page_spare_parts/{advert}', [\App\Http\Controllers\GoodsController::class, 'index'])->name('catalog.item-page-spare-parts');
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::middleware('managerauth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.show_users');
            Route::get('/create', [\App\Http\Controllers\Admin\UsersController::class, 'showCreateUser'])->name('admin.create_user_form');
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

        Route::group(['prefix' => 'banner_control'], function (){
            Route::get('/', [\App\Http\Controllers\Admin\BannerController::class, 'index'])->name('admin.banner_control');
            Route::post('/create_banner', [\App\Http\Controllers\Admin\BannerController::class, 'createBanner'])->name('admin.create_banner');
            Route::get('/close_banner/{banner}', [\App\Http\Controllers\Admin\BannerController::class, 'closeBanner'])->name('admin.close_banner');
        });

    });
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.showlogin');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
});


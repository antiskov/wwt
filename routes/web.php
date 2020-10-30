<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;
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
    Route::get('/test', [\App\Http\Controllers\HomeController::class, 'test']); //todo: remove on prod
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::post('/register-user', [\App\Http\Controllers\AjaxController::class, 'registerUser'])->name('register-user');
    Route::post('/check-login-email', [\App\Http\Controllers\AjaxController::class, 'checkLoginEmail'])->name('check-login-email');
    Route::post('/login-password', [\App\Http\Controllers\AjaxController::class, 'authUser'])->name('login-password');
    Route::get('/reset-password/{email}', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('reset-password');
    Route::get('/email_verification_code/{email_verification_code}', [\App\Http\Controllers\UserController::class, 'emailVerificationCode'])->name('activation_link');

    Route::group(['prefix' => 'profile'], function () {
        Route::middleware('auth')->group(function () {
            Route::get('/settings', [\App\Http\Controllers\ProfileController::class, 'settingsIndex'])->name('profile-settings');
            Route::post('/settings-form', [\App\Http\Controllers\ProfileController::class, 'setBasicSettings'])->name('settings-form');
            Route::get('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileIndex'])->name('editing-profile');
            Route::post('/editing-profile', [\App\Http\Controllers\ProfileController::class, 'editingProfileForm'])->name('editing-profile-form');
            Route::get('/delete-avatar', [\App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('delete-avatar');
        });
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::middleware('managerauth')->group(function () {
        Route::get('/', [MainController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.show_users');
            Route::get('/create', [\App\Http\Controllers\Admin\UsersController::class, 'showCreateUser'])->name('admin.create_user_form');
            Route::post('/create', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.create_user');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'showEditUser'])->name('admin.edit_user_form');
            Route::post('/edit/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.edit_user');
        });

    });
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.showlogin');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
});


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
    Route::group(['prefix'=>'admin'], function () {
        Route::middleware('managerauth')->group(function () {
            Route::get('/',[MainController::class,'dashboard'])->name('admin.dashboard');
            Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');

            Route::group(['prefix'=>'users'],function() {
                Route::get('/',[\App\Http\Controllers\Admin\UsersController::class,'index'])->name('admin.show_users');
                Route::get('/create',[\App\Http\Controllers\Admin\UsersController::class,'showCreateUser'])->name('admin.create_user_form');
                Route::post('/create',[\App\Http\Controllers\Admin\UsersController::class,'store'])->name('admin.create_user');
            });

        });







        Route::get('login',[AuthController::class,'showLogin'])->name('admin.showlogin');
        Route::post('login',[AuthController::class,'login'])->name('admin.login');
    });



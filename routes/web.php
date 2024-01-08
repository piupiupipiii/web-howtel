<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('main');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/hotel/{id}', [HotelController::class, 'index'])->name('hotel');

Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => '/login', 'name' => 'login.'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
    });

    Route::group(['prefix' => '/register', 'name' => 'register.'], function () {
        Route::get('/', [RegisterController::class, 'create'])->name('create');
        Route::post('/', [RegisterController::class, 'store'])->name('store');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => '/logout', 'name' => 'logout.'], function () {
        Route::get('/', [LogoutController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/profile', 'name' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => '/booking', 'name' => 'booking.'], function () {
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::get('/{id}', [BookingController::class, 'detail'])->name('detail');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::patch('/cancel', [BookingController::class, 'cancel'])->name('cancel');
    });
});

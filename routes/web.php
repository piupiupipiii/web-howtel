<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use Illuminate\Routing\Router;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hotel/{id}', [HotelController::class, 'index'])->name('hotel');

Route::group(['prefix' => '/booking', 'as' => 'booking.'], function (Router $route) {
    $route->post('/', [BookingController::class, 'store'])->name('store');
    $route->get('/create', [BookingController::class, 'create'])->name('create');
});

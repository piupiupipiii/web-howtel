<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hotel/{id}', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotel');

Route::get('/booking/{hotel_id}', 'BookingController@show')->name('booking');
Route::get('/hotels', 'HotelController@showHotels')->name('showHotels');
Route::post('/booking', 'HotelController@bookingAction')->name('booking');







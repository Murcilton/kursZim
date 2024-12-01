<?php

use App\Http\Controllers\CruiseController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/home2', [CruiseController::class, 'showBookingForm'])->name('home');

Route::get('/booking-form', [CruiseController::class, 'showBookingForm'])->name('booking.form');
Route::get('/cruise-search', [CruiseController::class, 'searchCruise'])->name('cruise.search');
Route::get('/cruise-results', [CruiseController::class, 'searchCruise'])->name('cruise.results');
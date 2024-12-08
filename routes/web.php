<?php

use App\Http\Controllers\Admin\DataController as AdminDataController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CruiseController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/home', [CruiseController::class, 'showBookingForm'])->name('home');

Route::get('/booking-form', [CruiseController::class, 'showBookingForm'])->name('booking.form');
Route::get('/cruise-search', [CruiseController::class, 'searchCruise'])->name('cruise.search');
Route::get('/cruise-results', [CruiseController::class, 'searchCruise'])->name('cruise.results');

// Регистрация / Авторизация

Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cruises', [\App\Http\Controllers\ShowController::class, 'show'])->name('cruises');
Route::get('/ships', [\App\Http\Controllers\ShowController::class, 'showShips'])->name('ships');
Route::get('/cruise/{slug}', [\App\Http\Controllers\ShowController::class, 'showAll'])->name('show');
// Верификация

Route::get('forgot-password', function () {
    return view('user.forgot-password');
})->name('password.request');
Route::post('/forgot-password', [UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');
Route::get('reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
})->name('password.reset');
Route::post('reset-password', [UserController::class, 'resetPasswordUpdate'])->name('password.update');

Route::get('verify-email', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:3,1'])->name('verification.send');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/{slug}', [\App\Http\Controllers\Admin\CruiseController::class, 'show'])->name('admin.show');
    Route::get('/admin', [\App\Http\Controllers\Admin\CruiseController::class, 'index'])->name('admin');
    Route::get('/admin/create', [\App\Http\Controllers\Admin\CruiseController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [\App\Http\Controllers\Admin\CruiseController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/{cruise}', [\App\Http\Controllers\Admin\CruiseController::class, 'update'])->name('admin.update');
    Route::post('/admin/delete/{cruise}', [\App\Http\Controllers\Admin\CruiseController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/data/edit-all', [\App\Http\Controllers\Admin\DataController::class, 'editAll'])->name('admin.editAll');
    Route::put('/admin/dates/update/{date}', [\App\Http\Controllers\Admin\DataController::class, 'updateDate'])->name('dates.update');
    Route::put('/admin/departures/update/{departure}', [\App\Http\Controllers\Admin\DataController::class, 'updateDeparture'])->name('departures.update');
    Route::put('/admin/destinations/update/{destination}', [\App\Http\Controllers\Admin\DataController::class, 'updateDestination'])->name('destinations.update');
    Route::put('/admin/ships/update/{ship}', [\App\Http\Controllers\Admin\DataController::class, 'updateShip'])->name('ships.update');

    Route::delete('/admin/dates/delete/{date}', [\App\Http\Controllers\Admin\DataController::class, 'deleteDate'])->name('dates.delete');
    Route::delete('/admin/departures/delete/{departure}', [\App\Http\Controllers\Admin\DataController::class, 'deleteDeparture'])->name('departures.delete');
    Route::delete('/admin/destinations/delete/{destination}', [\App\Http\Controllers\Admin\DataController::class, 'deleteDestination'])->name('destinations.delete');
    Route::delete('/admin/ships/delete/{ship}', [\App\Http\Controllers\Admin\DataController::class, 'deleteShip'])->name('ships.delete');

    Route::get('/admin/create/data', [\App\Http\Controllers\Admin\CruiseController::class, 'createData'])->name('admin.createData');
    Route::post('/admin/dates/store', [\App\Http\Controllers\Admin\CruiseController::class, 'storeDate'])->name('dates.store');
    Route::post('/admin/departures/store', [\App\Http\Controllers\Admin\CruiseController::class, 'storeDep'])->name('departures.store');
    Route::post('/admin/destinations/store', [\App\Http\Controllers\Admin\CruiseController::class, 'storeDest'])->name('destinations.store');
    Route::post('/admin/ships/store', [\App\Http\Controllers\Admin\CruiseController::class, 'storeShip'])->name('ships.store');
});

// =========================CART============================================

    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart/del-item/{product_id}', [CartController::class, 'delItem'])->name('cart.del_item');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/cart/qty', function () {
        $cartQty = array_sum(session('cart', []));
        return response()->json(['cart_qty' => $cartQty]);
    })->name('cart.qty');
<?php

use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PlansController;
use App\Http\Controllers\Front\SellerController;
use App\Http\Controllers\Front\SubscriptionController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\VehicleController;
use App\Http\Controllers\Front\WebhooksController;
use App\Http\Controllers\ImageController;
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

Route::get('/', [HomeController::class, 'home'])->name('front.home');
Route::view('register/seller', 'front.auth.seller')->name('register.seller')->middleware('guest:web');
Route::post('uploadsImage/{folder}/{vehicle_id?}', [ImageController::class, 'uploadImage'])->name('upload');
Route::put('deleteCarImage/{id}', [ImageController::class, 'edit']);
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('plans', PlansController::class)->name('front.plans.index');
Route::group(['as' => 'front.'], function () {
    Route::middleware('auth:web')->group(function () {
        Route::resource('vehicles', VehicleController::class)->except(['show', 'index']);
        Route::get('checkout', [CheckoutController::class, 'choose'])->name('checkout.index');
        Route::post('checkout/pay', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::group(['prefix' => 'userDashboard', 'as' => 'user.'], function () {
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::get('/settings', [UserController::class, 'settings'])->name('settings');
            Route::get('/vehicles', [UserController::class, 'vehicles'])->name('vehicles');
            Route::get('/subscriptions', [UserController::class, 'subscriptions'])->name('subscriptions');
        });
        Route::post('add-location', [SellerController::class, 'addLocationSeller'])->name('sellers.location');
        Route::match(['get', 'post'], 'success/{gateway}', [CheckoutController::class, 'success'])->name('success');
        Route::get('cancel/{gateway}', function () {
            return 'canceled';
        })->name('cancel');
        Route::delete('subscription/{subscription_id}/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    });

    Route::get('vehicles', [VehicleController::class, 'index'])
        ->name('vehicles.index');
    Route::get('vehicles/{vehicle}', [VehicleController::class, 'show'])
        ->name('vehicles.show');
    Route::resource('sellers', SellerController::class);
    Route::get('getSellers', [SellerController::class, 'getSellers'])->name('sellers.ajax');
    Route::post('add-location', [SellerController::class, 'addLocationSeller'])->name('sellers.location');
    Route::get('search', [VehicleController::class, 'search'])->name('vehicles.search.ajax');
    Route::get('compare', [VehicleController::class, 'compare'])->name('vehicles.compare');
    Route::post('webhooks/{gateway}', WebhooksController::class)->name('webhook');
});

require __DIR__ . '/admin.php';

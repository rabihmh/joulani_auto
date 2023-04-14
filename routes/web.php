<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SellerController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\Front\VehicleController;
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
Route::view('user/profile', 'front.users.userDashboard');
Route::view('user/profile/edit', 'front.users.editProfile');
Route::view('user/contact', 'front.user.contact')->name('contact');
Route::group(['as' => 'front.'], function () {
    Route::middleware('auth:web')->group(function () {
        Route::resource('vehicles', VehicleController::class)->except(['show', 'index']);
        Route::get('userDashboard', [UserController::class, 'index'])->name('user.dashboard');
    });

    Route::middleware('guest:web')->group(function () {
        Route::get('vehicles/', [VehicleController::class, 'index'])
            ->name('vehicles.index')->withoutMiddleware('auth:web');
        Route::get('vehicles/{vehicle}', [VehicleController::class, 'show'])
            ->name('vehicles.show')->withoutMiddleware('auth:web');
        Route::resource('sellers', SellerController::class)->only(['index', 'show']);
        Route::get('getSellers', [SellerController::class, 'getSellers'])->name('sellers.ajax');
        Route::get('search', [VehicleController::class, 'search'])->name('vehicles.search.ajax');
        Route::get('compare', [VehicleController::class, 'compare'])->name('vehicles.compare');
    });
});

require __DIR__ . '/admin.php';

<?php

use App\Http\Controllers\Front\SellerController;
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

Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'home'])->name('front.home');
Route::view('register/seller', 'front.auth.seller')->name('register.seller')->middleware('guest:web');
Route::post('uploadsImage/{folder}', [ImageController::class, 'uploadImage'])->name('upload');
Route::view('add/car', 'front.vehicles.create');
Route::view('user/profile', 'front.users.userDashboard');
Route::view('user/profile/edit', 'front.users.editProfile');
Route::view('user/contact', 'front.users.contact');
Route::group(['middleware' => 'auth:web', 'as' => 'front.'], function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('sellers', SellerController::class);
    Route::get('getSellers', [SellerController::class, 'getSellers'])->name('sellers.ajax');
    Route::get('search', [VehicleController::class, 'search'])->name('vehicles.search.ajax');
});
Route::get('compare', [VehicleController::class, 'compare'])->name('front.vehicles.compare');

require __DIR__ . '/admin.php';

<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::get('/', function () {
    return view('front.home');
})->name('house');
Route::get('/{page}', [Controller::class, 'getPage']);
Route::view('register/seller', 'front.auth.seller')->name('register.seller')->middleware('guest');
Route::POST('uploadsImage', [ImageController::class, 'uploadImage'])->name('upload');

require __DIR__ . '/admin.php';

<?php


use App\Http\Controllers\Admin\MouldController;
use App\Http\Controllers\Admin\VehiclesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MadeController;
Route::group(['as' => 'admin.', 'prefix' => 'admin/dashboard', 'middleware' => 'auth:admin'], function () {
    Route::view('/', 'admin.index')->name('home');

    Route::get('mades/trash', [MadeController::class, 'trash'])->name('mades.trash');
    Route::put('mades/{made}/restore', [MadeController::class, 'restore'])->name('mades.restore');
    Route::delete('mades/{made}/force-delete', [MadeController::class, 'forceDelete'])->name('mades.force-delete');
    Route::post('moulds/{made}', [MouldController::class, 'store'])->name('moulds.store');
    Route::get('moulds/{mould}/edit', [MouldController::class, 'edit'])->name('moulds.edit');
    Route::put('moulds/{mould}', [MouldController::class, 'update'])->name('moulds.update');
    Route::delete('moulds/{mould}/delete', [MouldController::class, 'destroy'])->name('moulds.destroy');
    Route::get('moulds/trash', [MouldController::class, 'trash'])->name('moulds.trash');
    Route::put('moulds/{mould}/restore', [MouldController::class, 'restore'])->name('moulds.restore');
    Route::delete('moulds/{mould}/force-delete', [MouldController::class, 'forceDelete'])->name('moulds.force-delete');
    Route::get('made/get-moulds-id/{made_id}', [MouldController::class, 'getMouldsById'])->name('moulds.ajax');
    Route::get('vehicles/create', [VehiclesController::class, 'create'])->name('vehicles.create');
    Route::post('vehicles/store', [VehiclesController::class, 'store'])->name('vehicles.store');
    Route::resource('mades', MadeController::class);

});

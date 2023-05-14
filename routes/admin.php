<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MadeController;
use App\Http\Controllers\Admin\MouldController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\VehiclesController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.', 'prefix' => 'admin/dashboard', 'middleware' => ['auth:admin', 'checkActiveStatus', 'MarkNotificationAsRead']], function () {
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
    Route::resources([
        'mades' => MadeController::class,
        'vehicles' => VehiclesController::class,
        'admins' => AdminController::class,
        'plans' => PlansController::class,
    ]);
    Route::put('admins/status-update/{id}', [AdminController::class, 'updateStatus'])->name('admins.status');
    Route::put('vehicles/status-update/{id}', [VehiclesController::class, 'updateStatus'])->name('vehicles.status');
    Route::put('vehicles/set-is-special/{id}', [VehiclesController::class, 'updateSpecial'])->name('vehicles.special');
    Route::put('vehicles/set_main_image/{id}', [VehiclesController::class, 'setMainImage']);
    Route::resource('roles', RolesController::class);
    Route::prefix('notifications')
        ->name('notifications.')
        ->group(function () {
            Route::get('/', [NotificationsController::class, 'index'])->name('index');
            Route::delete('/{notification}', [NotificationsController::class, 'destroy'])->name('destroy');
            Route::get('/readAll', [NotificationsController::class, 'MarkAllRead'])->name('readAll');
        });
    Route::resource('payment_methods', PaymentMethodsController::class);
});
Route::get('admin/dashboard/made/get-moulds-id/{made_id}', [MouldController::class, 'getMouldsById'])->name('moulds.ajax');
Route::get('admin/dashboard/made/get-moulds-child/{made_id}', [MouldController::class, 'getMouldsChild'])->name('moulds.ajax');

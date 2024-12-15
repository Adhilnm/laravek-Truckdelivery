<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
Route::middleware(['auth', 'can:isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'index'])->name('orders');
    Route::patch('/admin/orders/{id}', [AdminController::class, 'updateOrderStatus'])->name('orders.update');
});



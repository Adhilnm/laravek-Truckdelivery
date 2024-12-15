
<?php
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/orders', OrderController::class);    

    // Admin route to update order status
    Route::patch('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);
});

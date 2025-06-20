<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('app/orders', [\App\Api\Controllers\OrderController::class, 'create']);    
});

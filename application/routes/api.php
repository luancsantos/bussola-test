<?php

use Illuminate\Support\Facades\Route;
use App\Api\Controllers\OrderController;

Route::prefix('v1')->group(function () {    
    Route::post('orders', [\App\Api\Controllers\OrderController::class, 'create']);
    /*Route::apiResource('orders', OrderController::class)->except([
        'create', 'show', 'edit'
    ]);*/
});


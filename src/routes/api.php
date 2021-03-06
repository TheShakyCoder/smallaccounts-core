<?php

use Illuminate\Support\Facades\Route;
use Smallaccounts\Core\App\Http\Controllers\Api\CustomerController;

Route::prefix('/api/smallaccounts')->group(function() {
    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customers/create', [CustomerController::class, 'create']);
});
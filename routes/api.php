<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;


Route::get('/orders', [OrdersController::class, 'index']);


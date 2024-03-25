<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ChallanController;

Route::get('/challanfetch', [ChallanController::class, 'show']);

Route::post('/challan', [ChallanController::class, 'store']);



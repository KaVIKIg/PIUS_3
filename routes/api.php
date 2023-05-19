<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Customers\Controllers\CustomersController;
use App\Http\ApiV1\Modules\Reviews\Controllers\ReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('/customers', [CustomersController::class, 'index']);
    Route::get('/customers/{customer_id}', [CustomersController::class, 'get']);
    Route::delete('/customers/{customer_id}', [CustomersController::class, 'delete']);
    Route::patch('/customers/{customer_id}', [CustomersController::class, 'patch']);


    Route::get('/reviews', [ReviewsController::class, 'index']);
    Route::delete('/reviews/{review_id}', [ReviewsController::class, 'delete']);
    Route::patch('/reviews/{review_id}', [ReviewsController::class, 'patch']);
    Route::get('/reviews/{review_id}', [ReviewsController::class, 'get']);

});

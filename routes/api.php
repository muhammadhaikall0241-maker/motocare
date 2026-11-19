
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ServiceRegistrationController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\ServicePaymentController;

Route::apiResource('customers', CustomerController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('service-registrations', ServiceRegistrationController::class);
Route::apiResource('service-details', ServiceDetailController::class);
Route::apiResource('service-payments', ServicePaymentController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

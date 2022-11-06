<?php

use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\MotorcycleController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->group(function () {

    Route::controller(VehicleController::class)
        ->prefix('vehicle')
        ->group(function () {
            Route::get('get-all', 'index');
            Route::get('find/{id}', 'find');
            Route::post('store', 'store');
            Route::put('update/{id}', 'update');
            Route::delete('destroy/{id}', 'destroy');


            Route::controller(CarController::class)
                ->prefix('car')
                ->group(function () {
                    Route::get('get-all', 'index');
                    Route::get('find/{id}', 'find');
                    Route::post('store', 'store');
                    Route::put('update/{id}', 'update');
                    Route::delete('destroy/{id}', 'destroy');
                });

            Route::controller(MotorcycleController::class)
                ->prefix('motorcycle')
                ->group(function () {
                    Route::get('get-all', 'index');
                    Route::get('find/{id}', 'find');
                    Route::post('store', 'store');
                    Route::put('update/{id}', 'update');
                    Route::delete('destroy/{id}', 'destroy');
                });
        });

    Route::prefix('sales')->group(function () {

        Route::get('/get-stock', [VehicleController::class, 'index']);

        Route::get('/get-cars', [CarController::class, 'index']);

        Route::get('/get-motorcycles', [MotorcycleController::class, 'index']);
    });
});

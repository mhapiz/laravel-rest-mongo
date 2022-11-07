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
    Route::post('login', 'login')->name('api.login');
    Route::post('register', 'register')->name('api.register');
    Route::post('logout', 'logout')->name('api.logout');
    Route::post('refresh', 'refresh')->name('api.refresh');
});

Route::middleware('auth:api')->group(function () {

    Route::controller(VehicleController::class)
        ->prefix('vehicle')
        ->group(function () {
            Route::get('get-all', 'index')->name('api.vehicle.index');
            Route::get('find/{id}', 'find')->name('api.vehicle.find');
            Route::post('store', 'store')->name('api.vehicle.store');
            Route::put('update/{id}', 'update')->name('api.vehicle.update');
            Route::delete('destroy/{id}', 'destroy')->name('api.vehicle.destroy');


            Route::controller(CarController::class)
                ->prefix('car')
                ->group(function () {
                    Route::get('get-all', 'index')->name('api.car.index');
                    Route::get('find/{id}', 'find')->name('api.car.find');
                    Route::post('store', 'store')->name('api.car.store');
                    Route::put('update/{id}', 'update')->name('api.car.update');
                    Route::delete('destroy/{id}', 'destroy')->name('api.car.destroy');
                });

            Route::controller(MotorcycleController::class)
                ->prefix('motorcycle')
                ->group(function () {
                    Route::get('get-all', 'index')->name('api.motorcycle.index');
                    Route::get('find/{id}', 'find')->name('api.motorcycle.find');
                    Route::post('store', 'store')->name('api.motorcycle.store');
                    Route::put('update/{id}', 'update')->name('api.motorcycle.update');
                    Route::delete('destroy/{id}', 'destroy')->name('api.motorcycle.destroy');
                });
        });

    Route::prefix('sales')->group(function () {

        Route::get('/get-stock', [VehicleController::class, 'index'])->name('api.sales.get-stock');

        Route::get('/get-cars', [CarController::class, 'index'])->name('api.sales.get-cars');

        Route::get('/get-motorcycles', [MotorcycleController::class, 'index'])->name('api.sales.get-motorcycles');
    });
});

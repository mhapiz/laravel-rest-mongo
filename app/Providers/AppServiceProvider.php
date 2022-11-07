<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryImplement;
use App\Repositories\Car\CarRepository;
use App\Repositories\Car\CarRepositoryImplement;
use App\Repositories\Motorcycle\MotorcycleRepository;
use App\Repositories\Motorcycle\MotorcycleRepositoryImplement;
use App\Repositories\Vehicle\VehicleRepository;
use App\Repositories\Vehicle\VehicleRepositoryImplement;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceImplement;
use App\Services\Car\CarService;
use App\Services\Car\CarServiceImplement;
use App\Services\Motorcycle\MotorcycleService;
use App\Services\Motorcycle\MotorcycleServiceImplement;
use App\Services\Vehicle\VehicleService;
use App\Services\Vehicle\VehicleServiceImplement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthRepository::class, AuthRepositoryImplement::class);
        $this->app->bind(AuthService::class, AuthServiceImplement::class);
        //
        $this->app->bind(VehicleRepository::class, VehicleRepositoryImplement::class);
        $this->app->bind(VehicleService::class, VehicleServiceImplement::class);
        //
        $this->app->bind(MotorcycleRepository::class, MotorcycleRepositoryImplement::class);
        $this->app->bind(MotorcycleService::class, MotorcycleServiceImplement::class);
        //
        $this->app->bind(CarRepository::class, CarRepositoryImplement::class);
        $this->app->bind(CarService::class, CarServiceImplement::class);
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Repositories\Car;


interface CarRepository
{
    public function getAllCar();
    public function storeCar(array $data);
    public function updateCar($id, array $data);
    public function findSingleCar($id);
    public function destroyCar($id);
}

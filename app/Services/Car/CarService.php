<?php

namespace App\Services\Car;


interface CarService
{
    public function storeCar(array $data);
    public function updateCar($id, array $data);
    public function destroyCar($id);
}

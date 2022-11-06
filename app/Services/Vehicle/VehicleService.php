<?php

namespace App\Services\Vehicle;


interface VehicleService
{
    public function getAllVehicle();
    public function getVehicleById($id);
    public function storeVehicle(array $data);
    public function updateVehicle($id, array $data);
    public function destroyVehicle($id);
}

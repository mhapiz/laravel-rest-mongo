<?php

namespace App\Repositories\Vehicle;


interface VehicleRepository
{

    public function getAllVehicle();
    public function findSingleVehicle($id);
    public function storeVehicle(array $data);
    public function updateVehicle($id, array $data);
    public function destroyVehicle($id);
}

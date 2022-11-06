<?php

namespace App\Repositories\Vehicle;


interface VehicleRepository
{
    public function storeVehicle(array $data);
    public function updateVehicle($id, array $data);
    public function findSingleVehicle($id);
    public function destroyVehicle($id);
}

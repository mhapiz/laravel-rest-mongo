<?php

namespace App\Services\Vehicle;


interface VehicleService
{
    public function storeVehicle(array $data);
    public function updateVehicle($id, array $data);
    public function destroyVehicle($id);
}

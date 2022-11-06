<?php

namespace App\Services\Motorcycle;


interface MotorcycleService
{
    public function storeMotorcycle(array $data);
    public function updateMotorcycle($id, array $data);
    public function destroyMotorcycle($id);
}

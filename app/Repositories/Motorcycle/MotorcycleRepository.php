<?php

namespace App\Repositories\Motorcycle;


interface MotorcycleRepository
{
    public function getAllMotorcycle();
    public function storeMotorcycle(array $data);
    public function updateMotorcycle($id, array $data);
    public function findSingleMotorcycle($id);
    public function destroyMotorcycle($id);
}

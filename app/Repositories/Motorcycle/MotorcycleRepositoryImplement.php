<?php

namespace App\Repositories\Motorcycle;

use App\Models\Motorcycle;

class MotorcycleRepositoryImplement implements MotorcycleRepository
{
    private $model;
    public function __construct(Motorcycle $model)
    {
        $this->model = $model;
    }

    public function storeMotorcycle(array $data)
    {
        $data = $this->model->create([
            'mesin' => $data['mesin'],
            'tipe_suspensi' => $data['tipe_suspensi'],
            'tipe_transmisi' => $data['tipe_transmisi'],
            'vehicle_id' => $data['vehicle_id'],
        ]);

        return $data;
    }

    public function updateMotorcycle($id, array $data)
    {
        $item = $this->model->find($id);

        $item->update([
            'mesin' => $data['mesin'],
            'tipe_suspensi' => $data['tipe_suspensi'],
            'tipe_transmisi' => $data['tipe_transmisi'],
            'vehicle_id' => $data['vehicle_id'],
        ]);

        return $item;
    }

    public function findSingleMotorcycle($id)
    {
        return $this->model->find($id);
    }

    public function destroyMotorcycle($id)
    {
        $item = $this->model->find($id);

        $item->delete();

        return $item;
    }
}

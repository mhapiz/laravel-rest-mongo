<?php

namespace App\Repositories\Car;

use App\Models\Car;

class CarRepositoryImplement implements CarRepository
{
    private $model;
    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getAllCar()
    {
        return $this->model->with('vehicle')->get();
    }

    public function storeCar(array $data)
    {
        $data = $this->model->create([
            'mesin' => $data['mesin'],
            'kapasitas_penumpang' => $data['kapasitas_penumpang'],
            'tipe' => $data['tipe'],
            'vehicle_id' => $data['vehicle_id'],
        ]);

        return $data;
    }

    public function updateCar($id, array $data)
    {
        $item = $this->model->find($id);

        $item->update([
            'mesin' => $data['mesin'],
            'kapasitas_penumpang' => $data['kapasitas_penumpang'],
            'tipe' => $data['tipe'],
            'vehicle_id' => $data['vehicle_id'],
        ]);

        return $item;
    }

    public function findSingleCar($id)
    {
        return $this->model->find($id);
    }

    public function destroyCar($id)
    {
        $item = $this->model->find($id);

        $item->delete();

        return $item;
    }
}

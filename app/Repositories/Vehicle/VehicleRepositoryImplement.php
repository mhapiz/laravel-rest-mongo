<?php

namespace App\Repositories\Vehicle;

use App\Models\Vehicle;

class VehicleRepositoryImplement implements VehicleRepository
{
    private $model;
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    public function getAllVehicle()
    {
        return $this->model->with(['car', 'motorcycle'])->get();
    }

    public function storeVehicle(array $data)
    {
        $data = $this->model->create([
            'tahun_kendaraan' => $data['tahun_kendaraan'],
            'warna' => $data['warna'],
            'harga' => $data['harga'],
        ]);

        return $data;
    }

    public function updateVehicle($id, array $data)
    {
        $item = $this->model->find($id);

        $item->update([
            'tahun_kendaraan' => $data['tahun_kendaraan'],
            'warna' => $data['warna'],
            'harga' => $data['harga'],
        ]);

        return $item;
    }

    public function findSingleVehicle($id)
    {
        return $this->model->with(['car', 'motorcycle'])->find($id);
    }

    public function destroyVehicle($id)
    {
        $item = $this->model->find($id);

        $item->delete();

        return $item;
    }
}

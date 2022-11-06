<?php

namespace App\Services\Vehicle;


use App\Repositories\Vehicle\VehicleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class VehicleServiceImplement implements VehicleService
{
    private $vehicleRepository;
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function storeVehicle(array $data)
    {
        $req = Validator::make($data, [
            'tahun_kendaraan' => 'required|numeric',
            'warna' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to create vehicle';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 201];

        try {
            $result['message'] = 'Successfully created vehicle';
            $result['data'] = $this->vehicleRepository->storeVehicle($data);
        } catch (Exception $e) {
            $result['message'] = 'Failed to create vehicle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function updateVehicle($id, array $data)
    {
        $req = Validator::make($data, [
            'tahun_kendaraan' => 'required|numeric',
            'warna' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to update vehicle';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 200];

        try {

            $check = $this->vehicleRepository->findSingleVehicle($id);
            if ($check) {
                $result['message'] = 'Successfully updated vehicle';
                $result['data'] = $this->vehicleRepository->updateVehicle($id, $data);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed to update vehicle, vehicle not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed to update vehicle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function destroyVehicle($id)
    {
        $result = ['status' => 200];

        try {
            $check = $this->vehicleRepository->findSingleVehicle($id);
            if ($check) {
                $result['message'] = 'Successfully deleted';
                $result['data'] = $this->vehicleRepository->destroyVehicle($id);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed delete vehicle, vehicle not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed delete vehicle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }
}

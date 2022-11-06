<?php

namespace App\Services\Car;


use App\Repositories\Car\CarRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class CarServiceImplement implements CarService
{
    private $carRepository;
    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getAllCar()
    {
        $result = ['status' => 200];
        try {
            $result['message'] = 'Successfully get all car';
            $result['data'] = $this->carRepository->getAllCar();
        } catch (Exception $e) {
            $result['message'] = 'Failed to get all car';
            $result = [
                'status' => 404,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function getCarById($id)
    {
        $result = ['status' => 200];
        try {
            $check = $this->carRepository->findSingleCar($id);
            if ($check) {
                $result['message'] = 'Successfully get car';
                $result['data'] = $this->carRepository->findSingleCar($id);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'car not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed to get all car';
            $result = [
                'status' => 404,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function storeCar(array $data)
    {
        $req = Validator::make($data, [
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required|numeric',
            'tipe' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to create Car';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 200];

        try {
            $result['message'] = 'Successfully created Car';
            $result['data'] = $this->carRepository->storeCar($data);
        } catch (Exception $e) {
            $result['message'] = 'Failed to create Car';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function updateCar($id, array $data)
    {
        $req = Validator::make($data, [
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required|numeric',
            'tipe' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to update Car';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 200];

        try {

            $check = $this->carRepository->findSingleCar($id);
            if ($check) {
                $result['message'] = 'Successfully updated Car';
                $result['data'] = $this->carRepository->updateCar($id, $data);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed to update Car, Car not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed to update Car';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function destroyCar($id)
    {
        $result = ['status' => 200];

        try {
            $check = $this->carRepository->findSingleCar($id);
            if ($check) {
                $result['message'] = 'Successfully deleted';
                $result['data'] = $this->carRepository->destroyCar($id);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed delete Car, Car not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed delete Car';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }
}

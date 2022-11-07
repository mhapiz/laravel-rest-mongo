<?php

namespace App\Services\Motorcycle;


use App\Repositories\Motorcycle\MotorcycleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class MotorcycleServiceImplement implements MotorcycleService
{
    private $motorcycleRepository;
    public function __construct(MotorcycleRepository $motorcycleRepository)
    {
        $this->motorcycleRepository = $motorcycleRepository;
    }

    public function getAllMotorcycle()
    {
        $result = ['status' => 200];
        try {
            $result['message'] = 'Successfully get all motorcycle';
            $result['data'] = $this->motorcycleRepository->getAllMotorcycle();
        } catch (Exception $e) {
            $result['message'] = 'Failed to get all motorcycle';
            $result = [
                'status' => 404,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function getMotorcycleById($id)
    {
        $result = ['status' => 200];
        try {
            $check = $this->motorcycleRepository->findSingleMotorcycle($id);
            if ($check) {
                $result['message'] = 'Successfully get motorcycle';
                $result['data'] = $this->motorcycleRepository->findSingleMotorcycle($id);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Motorcycle not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed to get all motorcycle';
            $result = [
                'status' => 404,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function storeMotorcycle(array $data)
    {
        $req = Validator::make($data, [
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to create Motorcycle';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 201];

        try {
            $result['message'] = 'Successfully created Motorcycle';
            $result['data'] = $this->motorcycleRepository->storeMotorcycle($data);
        } catch (Exception $e) {
            $result['message'] = 'Failed to create Motorcycle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function updateMotorcycle($id, array $data)
    {
        $req = Validator::make($data, [
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to update Motorcycle';
            $result['errors'] = $req->errors();
            return $result;
        }

        $result = ['status' => 200];

        try {

            $check = $this->motorcycleRepository->findSingleMotorcycle($id);
            if ($check) {
                $result['message'] = 'Successfully updated Motorcycle';
                $result['data'] = $this->motorcycleRepository->updateMotorcycle($id, $data);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed to update Motorcycle, Motorcycle not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed to update Motorcycle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }

    public function destroyMotorcycle($id)
    {
        $result = ['status' => 200];

        try {
            $check = $this->motorcycleRepository->findSingleMotorcycle($id);
            if ($check) {
                $result['message'] = 'Successfully deleted';
                $result['data'] = $this->motorcycleRepository->destroyMotorcycle($id);
            } else {
                $result = ['status' => 404];
                $result['message'] = 'Failed delete Motorcycle, Motorcycle not found';
            }
        } catch (Exception $e) {
            $result['message'] = 'Failed delete Motorcycle';
            $result = [
                'status' => 409,
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }
}

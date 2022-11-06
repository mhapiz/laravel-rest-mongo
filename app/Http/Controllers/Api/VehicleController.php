<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Vehicle\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicleService;
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function index()
    {
        return $this->vehicleService->getAllVehicle();
    }

    public function find($id)
    {
        return $this->vehicleService->getVehicleById($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $result = $this->vehicleService->storeVehicle($data);

        return response()->json($result, $result['status']);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $result = $this->vehicleService->updateVehicle($id, $data);

        return response()->json($result, $result['status']);
    }

    public function destroy($id)
    {
        $result = $this->vehicleService->destroyVehicle($id);

        return response()->json($result, $result['status']);
    }
}

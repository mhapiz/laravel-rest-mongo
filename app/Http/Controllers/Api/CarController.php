<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Services\Car\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    private $carService;
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        return $this->carService->getAllCar();
    }

    public function find($id)
    {
        return $this->carService->getCarById($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $result = $this->carService->storeCar($data);

        return response()->json($result, $result['status']);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $result = $this->carService->updateCar($id, $data);

        return response()->json($result, $result['status']);
    }

    public function destroy($id)
    {
        $result = $this->carService->destroyCar($id);

        return response()->json($result, $result['status']);
    }
}

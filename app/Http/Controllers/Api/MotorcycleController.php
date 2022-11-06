<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Motorcycle\MotorcycleService;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    private $motorcycleService;
    public function __construct(MotorcycleService $motorcycleService)
    {
        $this->motorcycleService = $motorcycleService;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $result = $this->motorcycleService->storeMotorcycle($data);

        return response()->json($result, $result['status']);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $result = $this->motorcycleService->updateMotorcycle($id, $data);

        return response()->json($result, $result['status']);
    }

    public function destroy($id)
    {
        $result = $this->motorcycleService->destroyMotorcycle($id);

        return response()->json($result, $result['status']);
    }
}

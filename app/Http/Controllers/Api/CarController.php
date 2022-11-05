<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required',
            'tipe' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            return  response()->json([
                'status' => 'error',
                'errors' => $req->errors(),
            ], 422);
        }

        $data = Car::create([
            'mesin' => $request->mesin,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'tipe' => $request->tipe,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Car created successfully',
            'data' => $data,
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = Car::find($id);

        $req = Validator::make($request->all(), [
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required',
            'tipe' => 'required',
            'vehicle_id' => 'required',
        ]);

        if ($req->fails()) {
            return  response()->json([
                'status' => 'error',
                'errors' => $req->errors(),
            ], 422);
        }

        $data->update([
            'mesin' => $request->mesin,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'tipe' => $request->tipe,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Car updated successfully',
            'data' => $data,
        ], 200);
    }

    public function destroy($id)
    {
        $data = Car::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Car deleted successfully',
            'data' => $data,
        ]);
    }
}

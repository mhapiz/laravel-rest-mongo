<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorcycleController extends Controller
{
    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
            'vehicle_id' => 'required|exists:vehicles,_id',
        ]);

        if ($req->fails()) {
            return  response()->json([
                'status' => 'error',
                'errors' => $req->errors(),
            ], 422);
        }

        $data = Motorcycle::create([
            'mesin' => $request->mesin,
            'tipe_suspensi' => $request->tipe_suspensi,
            'tipe_transmisi' => $request->tipe_transmisi,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Motorcycle created successfully',
            'data' => $data,
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = Motorcycle::find($id);

        $req = Validator::make($request->all(), [
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
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
            'tipe_suspensi' => $request->tipe_suspensi,
            'tipe_transmisi' => $request->tipe_transmisi,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Motorcycle updated successfully',
            'data' => $data,
        ], 200);
    }

    public function destroy($id)
    {
        $data = Motorcycle::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Motorcycle deleted successfully',
            'data' => $data,
        ]);
    }
}

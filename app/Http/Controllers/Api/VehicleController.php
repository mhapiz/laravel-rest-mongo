<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function index()
    {
        # code...
    }

    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'tahun_kendaraan' => 'required',
            'warna' => 'required',
            'harga' => 'required',
        ]);

        if ($req->fails()) {
            return  response()->json([
                'status' => 'error',
                'errors' => $req->errors(),
            ], 422);
        }

        $data = Vehicle::create([
            'tahun_kendaraan' => $request->tahun_kendaraan,
            'warna' => $request->warna,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vehicle created successfully',
            'data' => $data,
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = Vehicle::find($id);

        $req = Validator::make($request->all(), [
            'tahun_kendaraan' => 'required',
            'warna' => 'required',
            'harga' => 'required',
        ]);

        if ($req->fails()) {
            return  response()->json([
                'status' => 'error',
                'errors' => $req->errors(),
            ], 422);
        }

        $data->update([
            'tahun_kendaraan' => $request->tahun_kendaraan,
            'warna' => $request->warna,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vehicle updated successfully',
            'data' => $data,
        ], 200);
    }

    public function destroy($id)
    {
        $data = Vehicle::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Vehicle deleted successfully',
            'data' => $data,
        ]);
    }
}

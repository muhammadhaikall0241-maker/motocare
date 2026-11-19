<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return response()->json(
            Vehicle::with('customer')->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'vehicle_type' => 'required|in:Matic,Manual Transmisi',
            'stnk_number' => 'required|string|unique:vehicles,stnk_number',
            'manufacture_year' => 'required|integer',
            'owner_name' => 'required|string',
            'color' => 'required|string',
        ]);

        $vehicle = Vehicle::create($validated);

        return response()->json($vehicle, 201);
    }

    public function show(string $id)
    {
        $vehicle = Vehicle::with('customer')->findOrFail($id);

        return response()->json($vehicle, 200);
    }

    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'plate_number' => 'sometimes|required|string|unique:vehicles,plate_number,' . $id,
            'vehicle_type' => 'sometimes|required|in:Matic,Manual Transmisi',
            'stnk_number' => 'sometimes|required|string|unique:vehicles,stnk_number,' . $id,
            'manufacture_year' => 'sometimes|required|integer',
            'owner_name' => 'sometimes|required|string',
            'color' => 'sometimes|required|string',
        ]);

        $vehicle->update($validated);

        return response()->json($vehicle, 200);
    }

    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json([
            'message' => 'Data kendaraan berhasil dihapus'
        ], 200);
    }
}

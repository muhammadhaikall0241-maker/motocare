<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function index()
    {
        return response()->json(
            ServiceDetail::with('serviceRegistration')->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_registration_id' => 'required|exists:service_registrations,id',
            'complaint' => 'required|string',
            'estimated_cost' => 'required|numeric|min:0',
            'mechanic_name' => 'required|string',
            'replacement_sparepart' => 'nullable|string',
        ]);

        $detail = ServiceDetail::create($validated);

        return response()->json($detail, 201);
    }

    public function show(string $id)
    {
        $detail = ServiceDetail::with('serviceRegistration')->findOrFail($id);

        return response()->json($detail, 200);
    }

    public function update(Request $request, string $id)
    {
        $detail = ServiceDetail::findOrFail($id);

        $validated = $request->validate([
            'service_registration_id' => 'sometimes|required|exists:service_registrations,id',
            'complaint' => 'sometimes|required|string',
            'estimated_cost' => 'sometimes|required|numeric|min:0',
            'mechanic_name' => 'sometimes|required|string',
            'replacement_sparepart' => 'nullable|string',
        ]);

        $detail->update($validated);

        return response()->json($detail, 200);
    }

    public function destroy(string $id)
    {
        $detail = ServiceDetail::findOrFail($id);
        $detail->delete();

        return response()->json([
            'message' => 'Detail servis berhasil dihapus'
        ], 200);
    }
}

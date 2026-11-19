<?php

namespace App\Http\Controllers;

use App\Models\ServiceRegistration;
use Illuminate\Http\Request;

class ServiceRegistrationController extends Controller
{
    public function index()
    {
        return response()->json(
            ServiceRegistration::with([
                'customer',
                'vehicle',
                'serviceDetails',
                'servicePayments'
            ])->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'complaint' => 'required|string',
            'service_date' => 'required|date',
        ]);

        $registration = ServiceRegistration::create($validated);

        return response()->json($registration, 201);
    }

    public function show(string $id)
    {
        $registration = ServiceRegistration::with([
            'customer',
            'vehicle',
            'serviceDetails',
            'servicePayments'
        ])->findOrFail($id);

        return response()->json($registration, 200);
    }

    public function update(Request $request, string $id)
    {
        $registration = ServiceRegistration::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'complaint' => 'sometimes|required|string',
            'service_date' => 'sometimes|required|date',
        ]);

        $registration->update($validated);

        return response()->json($registration, 200);
    }

    public function destroy(string $id)
    {
        $registration = ServiceRegistration::findOrFail($id);
        $registration->delete();

        return response()->json([
            'message' => 'Pendaftaran servis berhasil dihapus'
        ], 200);
    }
}

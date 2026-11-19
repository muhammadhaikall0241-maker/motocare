<?php

namespace App\Http\Controllers;

use App\Models\ServicePayment;
use Illuminate\Http\Request;

class ServicePaymentController extends Controller
{
    public function index()
    {
        return response()->json(
            ServicePayment::with('serviceRegistration')->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_registration_id' => 'required|exists:service_registrations,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:Cash/Tunai,Non Tunai',
            'description' => 'nullable|string',
        ]);

        $payment = ServicePayment::create($validated);

        return response()->json($payment, 201);
    }

    public function show(string $id)
    {
        $payment = ServicePayment::with('serviceRegistration')->findOrFail($id);

        return response()->json($payment, 200);
    }

    public function update(Request $request, string $id)
    {
        $payment = ServicePayment::findOrFail($id);

        $validated = $request->validate([
            'service_registration_id' => 'sometimes|required|exists:service_registrations,id',
            'amount' => 'sometimes|required|numeric|min:0',
            'payment_method' => 'sometimes|required|in:Cash/Tunai,Non Tunai',
            'description' => 'nullable|string',
        ]);

        $payment->update($validated);

        return response()->json($payment, 200);
    }

    public function destroy(string $id)
    {
        $payment = ServicePayment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'message' => 'Pembayaran berhasil dihapus'
        ], 200);
    }
}

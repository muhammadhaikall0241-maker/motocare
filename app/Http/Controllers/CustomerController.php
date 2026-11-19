<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    // Menampilkan seluruh data pelanggan
    public function index(): JsonResponse
    {
        $customers = Customer::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil ditampilkan',
            'data' => $customers
        ], 200);
    }

    // Menambahkan pelanggan baru
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'occupation' => 'required|string|max:255',
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil ditambahkan',
            'data' => $customer
        ], 201);
    }

    // Menampilkan detail pelanggan
    public function show(string $id): JsonResponse
    {
        $customer = Customer::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail pelanggan berhasil ditampilkan',
            'data' => $customer
        ], 200);
    }

    // Memperbarui data pelanggan
    public function update(Request $request, string $id): JsonResponse
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string',
            'occupation' => 'sometimes|required|string|max:255',
        ]);

        $customer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diperbarui',
            'data' => $customer
        ], 200);
    }

    // Menghapus data pelanggan
    public function destroy(string $id): JsonResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil dihapus'
        ], 200);
    }
}
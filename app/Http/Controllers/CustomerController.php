<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index(Request $request)
{
    // Ambil data untuk filter paket
    $packages = Package::all();

    // Ambil parameter pencarian dan filter dari request
    $search = $request->input('search');
    $package_id = $request->input('package_id');

    // Query dasar untuk pelanggan
    $query = Customer::with('package');

    // Filter berdasarkan nama pelanggan
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    // Filter berdasarkan paket internet
    if ($package_id) {
        $query->where('package_id', $package_id);
    }

    // Jalankan query dengan pagination
    $customers = $query->paginate(10);

    // Kirim hasil pencarian dan filter ke view
    return view('customers.index', compact('customers', 'packages', 'search', 'package_id'));
}

    // Menampilkan form untuk menambah pelanggan baru
    public function create()
    {
        $packages = Package::all();
        return view('customers.create', compact('packages'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email', // Email harus valid dan unik
        'phone_number' => 'required|string|max:20',         // Nomor telepon harus diisi
        'address' => 'nullable|string',
        'package_id' => 'required|exists:packages,id'
    ]);

    Customer::create($validated);
    return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
}

    // Menampilkan form edit pelanggan
    public function edit(Customer $customer)
    {
        $packages = Package::all();
        return view('customers.edit', compact('customer', 'packages'));
    }

    // Mengupdate data pelanggan
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
            'package_id' => 'required|exists:packages,id'
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Menghapus data pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }

    
}
<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // Menampilkan daftar paket internet
    public function index(Request $request)
{
    // Ambil parameter pencarian dan filter dari request
    $search = $request->input('search');
    $speed = $request->input('speed');

    // Query dasar untuk paket internet
    $query = Package::query();

    // Filter berdasarkan nama paket
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    // Filter berdasarkan kecepatan paket
    if ($speed) {
        $query->where('speed', $speed);
    }

    // Jalankan query dengan pagination
    $packages = $query->paginate(10);

    // Kirim hasil pencarian dan filter ke view
    return view('packages.index', compact('packages', 'search', 'speed'));
}

    // Menampilkan form untuk menambah paket internet baru
    public function create()
    {
        return view('packages.create');
    }

    // Menyimpan paket internet baru
    public function store(Request $request)
{
    // Validasi inputan
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'speed' => 'required|integer|min:1',  
        'price' => 'required|numeric|min:0',  
    ]);

    // Simpan data paket internet ke database
    Package::create($validated);

    return redirect()->route('packages.index')->with('success', 'Paket internet berhasil ditambahkan!');
}

    // Menampilkan form edit paket internet
    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    // Mengupdate data paket internet
    public function update(Request $request, Package $package)
    {
        // Validasi inputan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'speed' => 'required|integer|min:1',  
            'price' => 'required|numeric|min:0',  
        ]);
    
        // Update data paket internet di database
        $package->update($validated);
    
        return redirect()->route('packages.index')->with('success', 'Paket internet berhasil diubah!');
    }

    // Menghapus data paket internet
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}

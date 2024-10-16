@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container hero-section">
            <h1>Selamat Datang di Layanan Internet Kami</h1>
        </div>
        <br>
        <h1>Daftar Paket Internet</h1>
        <a href="{{ route('packages.create') }}" class="btn btn-primary">Tambah Paket</a>
        <a href="/customers" class="btn btn-primary" style="background-color: #e94446; border: 2px solid #e94446;">Daftar Pelanggan</a>
        <br>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <br>
        <!-- Form Pencarian dan Filter -->
        <form action="{{ route('packages.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari Nama Paket" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="speed" class="form-control">
                    <option value="">Semua Kecepatan</option>
                    <option value="30" {{ request('speed') == 30 ? 'selected' : '' }}>30 Mbps</option>
                    <option value="50" {{ request('speed') == 50 ? 'selected' : '' }}>50 Mbps</option>
                    <option value="100" {{ request('speed') == 100 ? 'selected' : '' }}>100 Mbps</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Daftar Paket Internet -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Kecepatan (Mbps)</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->speed }} Mbps</td>
                        <td>{{ number_format($package->price, 2) }}</td>
                        <td>
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $packages->links() }}
    </div>
@endsection
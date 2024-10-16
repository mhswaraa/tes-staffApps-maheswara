@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container hero-section">
            <h1>Selamat Datang di Layanan Internet Kami</h1>
        </div>
        <br>
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
        <a href="/packages" class="btn btn-primary" style="background-color: #e94446; border: 2px solid #e94446;">Lihat Paket</a>
        <br>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <br>
        <!-- Form Pencarian dan Filter -->
        <form action="{{ route('customers.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari Nama Pelanggan" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="package_id" class="form-control">
                    <option value="">Semua Paket Internet</option>
                    @foreach ($packages as $package)
                        <option value="{{ $package->id }}" {{ request('package_id') == $package->id ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <br>
        <!-- Daftar Pelanggan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Paket Internet</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->package->name }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Button Hapus -->
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $customer->id }})">Hapus</button>

                            <!-- Form Hapus -->
                            <form id="delete-form-{{ $customer->id }}" action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $customers->links() }}
    </div>

    <!-- Script SweetAlert -->
    <script>
        function confirmDelete(customerId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data setelah menghapusnya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form penghapusan jika konfirmasi ya
                    document.getElementById('delete-form-' + customerId).submit();
                }
            })
        }
    </script>
@endsection
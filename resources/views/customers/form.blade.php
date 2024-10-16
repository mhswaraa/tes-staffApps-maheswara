<div class="form-group">
    <label for="name">Nama:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name ?? '') }}">
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email ?? '') }}">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="phone_number">Nomor Telepon:</label>
    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $customer->phone_number ?? '') }}">
    @error('phone_number')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="address">Alamat:</label>
    <textarea name="address" class="form-control">{{ old('address', $customer->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="package_id">Paket Internet:</label>
    <select name="package_id" class="form-control">
        @foreach ($packages as $package)
            <option value="{{ $package->id }}" {{ isset($customer) && $customer->package_id == $package->id ? 'selected' : '' }}>
                {{ $package->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-success" style="background-color: #e94446; border: 2px solid #e94446;">Simpan</button>
    <a href="/customers" class="btn btn-primary" style="background-color: #e94446; border: 2px solid #e94446;">Kembali</a>
</div>

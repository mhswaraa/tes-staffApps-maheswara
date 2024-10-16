<div class="form-group">
    <label for="name">Nama Paket:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $package->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="speed">Kecepatan (Mbps):</label>
    <input type="number" name="speed" class="form-control" value="{{ old('speed', $package->speed ?? '') }}">
    @error('speed')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Harga (Rp):</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $package->price ?? '') }}">
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-success" style="background-color: #e94446; border: 2px solid #e94446;">Simpan</button>
    <a href="/packages" class="btn btn-primary" style="background-color: #e94446; border: 2px solid #e94446;">Kembali</a>
</div>



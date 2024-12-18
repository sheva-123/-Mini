<x-app-layout>

<div class="container">
    <h1>Edit Pertanian</h1>
    <form action="{{ route('pertanians.update', $pertanian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pertanian" class="form-label">Nama Pertanian</label>
            <input type="text" name="nama_pertanian" class="form-control" id="nama_pertanian" value="{{ $pertanian->nama_pertanian }}" required>
        </div>
        <div class="mb-3">
            <label for="lokasi_pertanian" class="form-label">Lokasi Pertanian</label>
            <input type="text" name="lokasi_pertanian" class="form-control" id="lokasi_pertanian" value="{{ $pertanian->lokasi_pertanian }}" required>
        </div>
        <div class="mb-3">
            <label for="luas_lahan" class="form-label">Luas Lahan (ha)</label>
            <input type="number" step="0.01" name="luas_lahan" class="form-control" id="luas_lahan" value="{{ $pertanian->luas_lahan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-app-layout>

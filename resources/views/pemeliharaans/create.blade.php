
<!-- Create View: resources/views/pemeliharaans/create.blade.php -->
<x-app-layout>
    
</x-app-layout>
    <div class="container">
        <h1>Tambah Pemeliharaans</h1>
        <form action="{{ route('pemeliharaans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="penanaman_id">Penanaman</label>
                <select name="penanaman_id" id="penanaman_id" class="form-control" required>
                    <option value="">Pilih Penanaman</option>
                    @foreach($penanaman as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                <input type="date" name="tanggal_pemeliharaan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                <input type="text" name="jenis_pemeliharaan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="text" name="biaya" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

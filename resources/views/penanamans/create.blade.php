<x-layout>
    <div class="container">
        <h1>Tambah Penanaman</h1>
        <form action="{{ route('penanamen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pertanian_id" class="form-label">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="form-control">
                    @foreach($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}">{{ $pertanian->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanaman_id" class="form-label">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="form-control">
                    @foreach($tanamen as $tanaman)
                        <option value="{{ $tanaman->id }}">{{ $tanaman->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_tanam" class="form-label">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" id="tanggal_tanam" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jumlah_tanaman" class="form-label">Jumlah Tanaman</label>
                <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>

<x-layout>
    <div class="container">
        <h1>Edit Penanaman</h1>
        <form action="{{ route('penanamans.update', $penanamans->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pertanian_id" class="form-label">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="form-control">
                    @foreach($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}" {{ $penanamans->pertanian_id == $pertanian->id ? 'selected' : '' }}>
                            {{ $pertanian->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanaman_id" class="form-label">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="form-control">
                    @foreach($tanaman as $tanaman)
                        <option value="{{ $tanaman->id }}" {{ $penanamans->tanaman_id == $tanaman->id ? 'selected' : '' }}>
                            {{ $tanaman->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_tanam" class="form-label">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" id="tanggal_tanam" value="{{ $penanamans->tanggal_tanam }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jumlah_tanaman" class="form-label">Jumlah Tanaman</label>
                <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" value="{{ $penanamans->jumlah_tanaman }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>

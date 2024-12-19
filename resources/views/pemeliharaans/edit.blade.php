<x-app-layout>
    
</x-app-layout>
    <div class="container">
        <h1>Edit Pemeliharaans</h1>
        <form action="{{ route('pemeliharaans.update', $pemeliharaans) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="penanaman_id">Penanaman</label>
                <select name="penanaman_id" id="penanaman_id" class="form-control" required>
                    <option value="">Pilih Penanaman</option>
                    @foreach($penanaman as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $pemeliharaans->penanaman_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                <input type="date" name="tanggal_pemeliharaan" class="form-control" value="{{ $pemeliharaans->tanggal_pemeliharaan }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                <input type="text" name="jenis_pemeliharaan" class="form-control" value="{{ $pemeliharaans->jenis_pemeliharaan }}" required>
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="text" name="biaya" class="form-control" value="{{ $pemeliharaans->biaya }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>

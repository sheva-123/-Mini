<!-- Create View: resources/views/pemeliharaans/create.blade.php -->
<x-app-layout>
    <x-slot name="title">Tambah Pemeliharaan</x-slot>

    <div class="container">
        <h1>Tambah Pemeliharaan</h1>

        <!-- Pesan error jika ada kesalahan validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk menambah pemeliharaan -->
        <form action="{{ route('pemeliharaans.create') }}" method="POST">
            @csrf

            <!-- Penanaman -->
            <div class="form-group">
                <label for="penanaman_id">Penanaman</label>
                <select name="penanaman_id" id="penanaman_id" class="form-control" required>
                    <option value="">Pilih Penanaman</option>
                    @foreach($penanaman as $item)
                        <option value="{{ $item->id }}" {{ old('penanaman_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pemeliharaan -->
            <div class="form-group">
                <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                <input 
                    type="date" 
                    name="tanggal_pemeliharaan" 
                    class="form-control" 
                    value="{{ old('tanggal_pemeliharaan') }}" 
                    required>
            </div>

            <!-- Jenis Pemeliharaan -->
            <div class="form-group">
                <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                <input 
                    type="text" 
                    name="jenis_pemeliharaan" 
                    class="form-control" 
                    value="{{ old('jenis_pemeliharaan') }}" 
                    required>
            </div>

            <!-- Biaya -->
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input 
                    type="text" 
                    name="biaya" 
                    class="form-control" 
                    value="{{ old('biaya') }}" 
                    required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>

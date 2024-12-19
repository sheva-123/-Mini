<x-app-layout>
    <x-slot name="title">Tambah Penanaman</x-slot>

    <div class="container">
        <h1>Tambah Penanaman</h1>

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Penanamans.store') }}" method="POST">
            @csrf
            <!-- Pilihan Pertanian -->
            <div class="mb-3">
                <label for="pertanian_id" class="form-label">Pertanian</label>
                <select name="pertanian_id" id="pertanian_id" class="form-control">
                    @foreach ($pertanians as $pertanian)
                        <option value="{{ $pertanian->id }}"
                            {{ old('pertanian_id') == $pertanian->id ? 'selected' : '' }}>
                            {{ $pertanian->nama_pertanian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan Tanaman -->
            <div class="mb-3">
                <label for="tanaman_id" class="form-label">Tanaman</label>
                <select name="tanaman_id" id="tanaman_id" class="form-control">
                    @foreach ($tanamans as $tanaman)
                        <option value="{{ $tanaman->id }}" {{ old('tanaman_id') == $tanaman->id ? 'selected' : '' }}>
                            {{ $tanaman->nama_tanaman }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Tanam -->
            <div class="mb-3">
                <label for="tanggal_tanam" class="form-label">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" id="tanggal_tanam" class="form-control"
                    value="{{ old('tanggal_tanam') }}">
            </div>

            <!-- Jumlah Tanaman -->
            <div class="mb-3">
                <label for="jumlah_tanaman" class="form-label">Jumlah Tanaman</label>
                <input type="number" name="jumlah_tanaman" id="jumlah_tanaman" class="form-control"
                    value="{{ old('jumlah_tanaman') }}">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>

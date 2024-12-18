@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pengeluaran</h1>

        <form action="{{ route('pengeluarans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_pertanian">Pertanian</label>
                <select name="id_pertanian" class="form-control" id="id_pertanian">
                    @foreach ($pertanigans as $pertanian)
                        <option value="{{ $pertanian->id }}">{{ $pertanian->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" name="tanggal_pengeluaran" class="form-control" id="tanggal_pengeluaran" required>
            </div>

            <div class="form-group mt-3">
                <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
                <input type="text" name="jenis_pengeluaran" class="form-control" id="jenis_pengeluaran" required>
            </div>

            <div class="form-group mt-3">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" class="form-control" id="biaya" required>
            </div>

            <button type="submit" class="btn btn-success mt-4">Simpan</button>
        </form>

        <a href="{{ route('pengeluarans.index') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
@endsection

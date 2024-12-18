@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pemanenan</h1>

        <form action="{{ route('pemanenans.update', $pemanenan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_penanaman">Penanaman</label>
                <select name="id_penanaman" class="form-control" id="id_penanaman">
                    @foreach ($penanamans as $penanaman)
                        <option value="{{ $penanaman->id }}"
                            {{ $penanaman->id == $pemanenan->id_penanaman ? 'selected' : '' }}>
                            {{ $penanaman->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="tanggal_pemanenan">Tanggal Pemanenan</label>
                <input type="date" name="tanggal_pemanenan" class="form-control" id="tanggal_pemanenan"
                    value="{{ $pemanenan->tanggal_pemanenan }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="jumlah_hasil">Jumlah Hasil</label>
                <input type="number" name="jumlah_hasil" class="form-control" id="jumlah_hasil"
                    value="{{ $pemanenan->jumlah_hasil }}" required>
            </div>

            <button type="submit" class="btn btn-warning mt-4">Update</button>
        </form>

        <a href="{{ route('pemanenans.index') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Pertanian; // Model Pertanian
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengeluaranController extends Controller
{
    // Menampilkan daftar pengeluaran dengan fitur pencarian
    public function index(Request $request)
    {


        $pengeluarans = Pengeluaran::with('pertanian')->get(); // Relasi ke model Pertanian
        return view('petani.pengeluarans.index', compact('pengeluarans'));
    }

    // Menampilkan form tambah pengeluaran
    public function create()
    {
        $pertanian = Pertanian::all();
        return view('petani.pengeluarans.create', compact('pertanian'));

    }

    // Menyimpan pengeluaran
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pertanian' => 'required|exists:pertanians,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric',
        ],[
            'biaya.numeric' => 'Inputan Biaya Harus Berupa Angka'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pengeluarans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        Pengeluaran::create([
            'pertanian_id' => $request->nama_pertanian,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'biaya' => $request->biaya,
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit pengeluaran
    public function edit(Pengeluaran $pengeluaran)
    {
        $pertanian = Pertanian::all(); // Mengambil semua data Pertanian
        return view('petani.pengeluarans.edit', compact('pengeluaran', 'pertanian'));
    }

    // Menyimpan perubahan pengeluaran
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanian,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric',
        ],[
            'biaya.numeric' => 'Inputan Biaya Harus Berupa Jumlah Angka'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return redirect()->route('pengeluarans.index')
            ->withErrors($validator)
                ->withInput();
        }

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    // Menghapus pengeluaran
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}

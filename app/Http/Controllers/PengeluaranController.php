<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Pertanian; // Model Pertanian
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // Menampilkan daftar pengeluaran dengan fitur pencarian
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $pengeluarans = Pengeluaran::with('pertanian') // Relasi ke model Pertanian
            ->when($cari, function ($query, $cari) {
                return $query->where('jenis_pengeluaran', 'like', "%{$cari}%");
            })
            ->get();

        return view('pengeluarans.index', compact('pengeluarans', 'cari'));
    }

    // Menampilkan form tambah pengeluaran
    public function create()
    {
        $pertanian = Pertanian::all(); // Mengambil semua data Pertanian
        return view('pengeluarans.create', compact('pertanian'));
    
    }

    // Menyimpan pengeluaran
    public function store(Request $request)
    {
        $request->validate([
            'pertanian_id' => 'required|exists:pertanian,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|string',
        ]);
        

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluarans.index');
    }

    // Menampilkan form edit pengeluaran
    public function edit(Pengeluaran $pengeluaran)
    {
        $pertanian = Pertanian::all(); // Mengambil semua data Pertanian
        return view('pengeluarans.edit', compact('pengeluarans', 'pertanians'));
    }

    // Menyimpan perubahan pengeluaran
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'id_pertanian' => 'required|exists:pertanian,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

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

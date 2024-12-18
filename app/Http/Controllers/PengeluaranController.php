<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Pertenakan; // Model Pertanian
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // Menampilkan daftar pengeluaran dengan fitur pencarian
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $pengeluarans = Pengeluaran::with('pertanian') // Relasi ke pertanian
            ->when($cari, function ($query, $cari) {
                return $query->where('jenis_pengeluaran', 'like', "%{$cari}%");
            })
            ->get();

        return view('pengeluarans.index', compact('pengeluarans', 'cari'));
    }

    // Menampilkan form tambah pengeluaran
    public function create()
    {
        $pertanigans = Pertanian::all(); // Ambil semua pertanian
        return view('pengeluarans.create', compact('pertanigans'));
    }

    // Menyimpan pengeluaran
    public function store(Request $request)
    {
        $request->validate([
            'id_pertanian' => 'required|exists:pertanigans,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric',
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluarans.index');
    }

    // Menampilkan form edit pengeluaran
    public function edit(Pengeluaran $pengeluaran)
    {
        $pertanigans = Pertanian::all();
        return view('pengeluarans.edit', compact('pengeluaran', 'pertanigans'));
    }

    // Menyimpan perubahan pengeluaran
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'id_pertanian' => 'required|exists:pertanigans,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric',
        ]);

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluarans.index');
    }

    // Menghapus pengeluaran
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index');
    }
}

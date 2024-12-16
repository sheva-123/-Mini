<?php

namespace App\Http\Controllers;

use App\Models\Pemanenan;
use App\Models\Penanaman;
use Illuminate\Http\Request;

class PemanenanController extends Controller
{
    /**
     * Tampilkan daftar pemanenan.
     */
    public function index()
    {
        $pemanenan = Pemanenan::with('penanaman')->get(); // Sertakan data penanaman terkait
        return view('pemanenan.index', compact('pemanenan'));
    }

    /**
     * Tampilkan form untuk menambahkan pemanenan baru.
     */
    public function create()
    {
        $penanaman = Penanaman::all(); // Ambil semua data penanaman untuk dropdown
        return view('pemanenan.create', compact('penanaman'));
    }

    /**
     * Simpan pemanenan baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_penanaman' => 'required|exists:penanamans,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer|min:0',
        ]);

        Pemanenan::create($request->all());
        return redirect()->route('pemanenan.index')->with('success', 'Pemanenan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail pemanenan tertentu.
     */
    public function show(Pemanenan $pemanenan)
    {
        return view('pemanenan.show', compact('pemanenan'));
    }

    /**
     * Tampilkan form untuk mengedit pemanenan tertentu.
     */
    public function edit(Pemanenan $pemanenan)
    {
        $penanaman = Penanaman::all(); // Ambil semua data penanaman untuk dropdown
        return view('pemanenan.edit', compact('pemanenan', 'penanaman'));
    }

    /**
     * Perbarui data pemanenan di database.
     */
    public function update(Request $request, Pemanenan $pemanenan)
    {
        $request->validate([
            'id_penanaman' => 'required|exists:penanamans,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer|min:0',
        ]);

        $pemanenan->update($request->all());
        return redirect()->route('pemanenan.index')->with('success', 'Pemanenan berhasil diperbarui.');
    }

    /**
     * Hapus pemanenan dari database.
     */
    public function destroy(Pemanenan $pemanenan)
    {
        $pemanenan->delete();
        return redirect()->route('pemanenan.index')->with('success', 'Pemanenan berhasil dihapus.');
    }
}

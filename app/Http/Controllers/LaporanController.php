<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pertanian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan tanggal_laporan
        $cari = $request->input('cari');
        $laporans = Laporan::when($cari, function ($query, $cari) {
                return $query->where('tanggal_laporan', 'like', "%$cari%");
            })
            ->with('pertanian') // Memuat relasi
            ->orderBy('tanggal_laporan', 'desc')
            ->paginate(10);

        return view('laporans.index', compact('laporans', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pertanians = Pertanian::all(); // Fetch all related 'pertanian' data
        return view('laporans.create', compact('pertanians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        return view('laporans.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        $pertanians = Pertanian::all();
        return view('laporans.edit', compact('laporan', 'pertanians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        try {
            $laporan->delete();
            return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('laporans.index')->with('error', 'Terjadi kesalahan saat menghapus laporan: ' . $e->getMessage());
    }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Pertanian;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::with('pertanian')->get(); // Include related farm data
        return view('pengeluarans.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pertanian = Pertanian::all(); // Fetch all farms for dropdown
        return view('pengeluarans.create', compact('pertanians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pertanian' => 'required|exists:pertanians,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        Pengeluaran::create($request->all());
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluarans.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $pertanian = Pertanian::all(); // Fetch all farms for dropdown
        return view('pengeluarans.edit', compact('pengeluaran', 'pertanian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'id_pertanian' => 'required|exists:pertanians,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        $pengeluaran->update($request->all());
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}

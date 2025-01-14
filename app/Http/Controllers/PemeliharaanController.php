<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Penanaman;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Pemeliharaan::with('penanaman');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('jenis_pemeliharaan', 'like', "%{$search}%")
                  ->orWhereHas('penanamans', function ($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  });
        }

        $pemeliharaans = $query->get();
        return view('admin.pemeliharaans.index', compact('pemeliharaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penanaman = Penanaman::all();
        return view('admin.pemeliharaans.create', compact('penanaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
        ]);

        Pemeliharaan::create($request->all());

        return redirect()->route('pemeliharaans.index')->with('success', 'Pemeliharaan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeliharaan $pemeliharaans)
    {
        $penanaman = Penanaman::all();
        return view('pemeliharaans.edit', compact('pemeliharaans', 'penanamans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaans)
    {
        $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
        ]);

        $pemeliharaans->update($request->all());

        return redirect()->route('pemeliharaans.index')->with('success', 'Pemeliharaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeliharaan $pemeliharaans)
    {
        $pemeliharaans->delete();

        return redirect()->route('pemeliharaans.index')->with('success', 'Pemeliharaan berhasil dihapus.');
    }
}

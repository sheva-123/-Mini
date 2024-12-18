<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use Illuminate\Http\Request;

class PertanianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanians = Pertanian::all();
        return view('pertanians.index', compact('pertanians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pertanians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pertanian' => 'required|string|max:255',
            'lokasi_pertanian' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
        ]);

        Pertanian::create($validated);

        return redirect()->route('pertanians.index')->with('success', 'Data pertanian berhasil ditambahkan!');
        }

    /**
     * Display the specified resource.
     */
    public function show(Pertanian $pertanian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanian $pertanian)
    {
        return view('pertanians.edit', compact('pertanian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanian $pertanian)
    {
        $validated = $request->validate([
            'nama_pertanian' => 'required|string|max:255',
            'lokasi_pertanian' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
        ]);

        $pertanian->update($validated);

        return redirect()->route('pertanians.index')->with('success', 'Data pertanian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanian $pertanian)
    {
        $pertanian->delete();

        return redirect()->route('pertanians.index')->with('success', 'Data pertanian berhasil dihapus!');
    }
}

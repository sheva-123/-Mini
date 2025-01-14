<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanamans = Tanaman::all();
        return view('admin.tanamans.index', compact('tanamans'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tanamans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Tanaman::create($request->all());
        return redirect()->route('tanamans.index')->with('success', 'Data berhasil ditambahkan');
        }

    /**
     * Display the specified resource.
     */
    public function show(Tanaman $tanaman)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanaman $tanaman)
    {
        return view('admin.tanamans.edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanaman $tanaman)
    {
        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $tanaman->update($request->all());
        return redirect()->route('tanamans.index')->with('success', 'Tanaman berhasil diperbarui.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();
        return redirect()->route('tanamans.index')->with('success', 'Tanaman berhasil dihapus.');
       }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use Illuminate\Http\Request;

class PertanianController extends Controller
{

    public function index()
    {
        $pertanians = Pertanian::all();
        return view('admin.pertanians.index', compact('pertanians'));
    }


    public function create()
    {
        return view('admin.pertanians.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_pertanian' => 'required|string|max:255',
            'lokasi_pertanian' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
        ]);
        $pertanian = Pertanian::firstWhere("nama_pertanian", $request->nama_pertanian);
        if($pertanian){
            return redirect()->back()->with('error', 'Data yang anda tambahkan sudah ada, masukkan data yang berbeda!') ->withInput();
        }

        Pertanian::create($request->all());

        return redirect()->route('pertanians.index')->with('success', 'Data berhasil ditambahkan');

        //     $pertanian = Pertanian::create($validated);

        //     // Pastikan properti dikembalikan dengan nama yang benar
        //     return response()->json([
        //         'id' => $pertanian->id ?? '',
        //         'nama_pertanian' => $pertanian->nama_pertanian ?? '',
        //         'lokasi_pertanian' => $pertanian->lokasi_pertanian ?? '',
        //         'luas_lahan' => $pertanian->luas_lahan ?? '',
        //         'created_at' => $pertanian->created_at ? $pertanian->created_at->format('Y-m-d H:i:s') : '',
        //     ]);
        //
    }

    public function show(Pertanian $pertanian)
    {
        //
    }


    public function edit(Pertanian $pertanian)
    {
        return view('admin.pertanians.edit', compact('pertanian'));
    }


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


    public function destroy(Pertanian $pertanian)
    {
        $pertanian->delete();

        return redirect()->route('pertanians.index')->with('success', 'Data pertanian berhasil dihapus!');
    }
}

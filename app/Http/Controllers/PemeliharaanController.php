<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Penanaman;
use App\Models\Pertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Pemeliharaan::with('pertanian');

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
        $pertanian = Pertanian::all();
        return view('admin.pemeliharaans.create', compact('pertanian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
        ], [
            'tanggal_pemeliharaan.max:255' => 'Character Maximal 255',
            'biaya.max:255' => 'Character Maximal 255'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemeliharaans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

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
        $validator = Validator::make($request->all(), [
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
        ], [
            'tanggal_pemeliharaan.max:255' => 'Character Maximal 255',
            'biaya.max:255' => 'Character Maximal 255'
        ]);

            if ($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemeliharaans.index')
                ->withErrors($validator)
                    ->withInput();
            }

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

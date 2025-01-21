<?php

namespace App\Http\Controllers;

use App\Models\Penanaman;
use App\Models\Pertanian;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenanamanController extends Controller
{
    /**
     * Menampilkan daftar penanaman.
     */
    public function index()
    {
        $penanamans = Penanaman::with('tanaman')->get();
        return view('admin.penanamans.index', compact('penanamans'));
    }

    /**
     * Menampilkan form untuk membuat penanaman baru.
     */
    public function create()
    {
        $pertanians = Pertanian::all();
        $tanamans = Tanaman::all();
        return view('admin.penanamans.create', compact('pertanians', 'tanamans'));
    }

    /**
     * Menyimpan penanaman baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_tanam' => 'required|date',
            'jumlah_tanaman' => 'required|integer',
        ],[
            'tanggal_tanam.date' => 'Date Required',
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('penanamans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        Penanaman::create([
            'pertanian_id' => $request->pertanian_id,
            'tanaman_id' => $request->tanaman_id,
            'tanggal_tanam' => $request->tanggal_tanam,
            'jumlah_tanaman' => $request->jumlah_tanaman,
        ]);

        return redirect()->route('penanamans.index')->with('success', 'Penanaman berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit penanaman.
     */
    public function edit(Penanaman $penanaman)
    {
        $pertanians = Pertanian::all();
        $tanamans = Tanaman::all();
        return view('penanamans.edit', compact('penanaman', 'pertanians', 'tanamans'));
    }

    /**
     * Mengupdate penanaman.
     */
    public function update(Request $request, Penanaman $penanaman)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_tanam' => 'required|date',
            'jumlah_tanaman' => 'required|integer',
        ], [
            'tanggal_tanam.date' => 'Date Required',
        ]);

            if ($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('penanamans.index')
                ->withErrors($validator)
                    ->withInput();
            }

        $penanaman->update([
            'pertanian_id' => $request->pertanian_id,
            'tanaman_id' => $request->tanaman_id,
            'tanggal_tanam' => $request->tanggal_tanam,
            'jumlah_tanaman' => $request->jumlah_tanaman,
        ]);

        return redirect()->route('penanamans.index')->with('success', 'Penanaman berhasil diupdate.');
    }

    /**
     * Menghapus penanaman.
     */
    public function destroy(Penanaman $penanaman)
    {
        $penanaman->delete();

        return redirect()->route('penanamans.index')->with('success', 'Penanaman berhasil dihapus.');
    }
}

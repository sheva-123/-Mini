<?php

namespace App\Http\Controllers;

use App\Models\Pemanenan;
use App\Models\Penanaman; // Model Penanaman
use Illuminate\Http\Request;

class PemanenanController extends Controller
{
    // Menampilkan daftar pemanenan dengan fitur pencarian
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $pemanenans = Pemanenan::with('penanaman') // Relasi ke penanaman
            ->when($cari, function ($query, $cari) {
                return $query->where('tanggal_pemanenan', 'like', "%{$cari}%");
            })
            ->get();

    //         // Data untuk grafik
    // $dataGrafik = Pemanenan::selectRaw('DATE(tanggal_pemanenan) as tanggal, SUM(jumlah_hasil) as total_hasil')
    // ->groupBy('tanggal')
    // ->orderBy('tanggal', 'asc')
    // ->get();

    return view('pemanenans.index', compact('pemanenans', 'cari'));
    }

    // Menampilkan form tambah pemanenan
    public function create()
    {
        $penanamans = Penanaman::all(); // Ambil semua penanaman
        return view('pemanenans.create', compact('penanamans'));
    }

    // Menyimpan pemanenan
    public function store(Request $request)
    {
        $request->validate([
            'id_penanaman' => 'required|exists:penanamans,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer',
        ]);

        Pemanenan::create($request->all());

        return redirect()->route('pemanenans.index');
    }

    // Menampilkan form edit pemanenan
    public function edit(Pemanenan $pemanenan)
    {
        $penanamans = Penanaman::all();
        return view('pemanenans.edit', compact('pemanenan', 'penanamans'));
    }

    // Menyimpan perubahan pemanenan
    public function update(Request $request, Pemanenan $pemanenan)
    {
        $request->validate([
            'id_penanaman' => 'required|exists:penanamans,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer',
        ]);

        $pemanenan->update($request->all());

        return redirect()->route('pemanenans.index');
    }

    // Menghapus pemanenan
    public function destroy(Pemanenan $pemanenan)
    {
        $pemanenan->delete();
        return redirect()->route('pemanenans.index');
    }
}

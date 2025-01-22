<?php

namespace App\Http\Controllers;

use App\Models\Pemanenan;
use App\Models\Penanaman; // Model Penanaman
use App\Models\Pertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemanenanController extends Controller
{
    // Menampilkan daftar pemanenan dengan fitur pencarian
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        $pemanenans = Pemanenan::with('pertanian') // Relasi ke penanaman
            ->when($cari, function ($query, $cari) {
                return $query->where('tanggal_pemanenan', 'like', "%{$cari}%");
            })
            ->get();

    //         // Data untuk grafik
    // $dataGrafik = Pemanenan::selectRaw('DATE(tanggal_pemanenan) as tanggal, SUM(jumlah_hasil) as total_hasil')
    // ->groupBy('tanggal')
    // ->orderBy('tanggal', 'asc')
    // ->get();

    return view('admin.pemanenans.index', compact('pemanenans', 'cari'));
    }

    // Menampilkan form tambah pemanenan
    public function create()
    {
        $pertanians = Pertanian::all(); // Ambil semua penanaman
        return view('admin.pemanenans.create', compact('pertanians'));
    }

    // Menyimpan pemanenan
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer',
        ],[
            'tanggal_pemanenan.date' => 'Date Lajwdnd'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemanenans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        Pemanenan::create($request->all());

        return redirect()->route('pemanenans.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit pemanenan
    public function edit(Pemanenan $pemanenan)
    {
        $pertanians = Pertanian::all();
        $penanaman = Penanaman::all();
        return view('admin.pemanenans.edit', compact('pemanenan', 'pertanians', 'penanaman'));
    }

    // Menyimpan perubahan pemanenan
    public function update(Request $request, Pemanenan $pemanenan)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer',
        ], [
            'tanggal_pemanenan.date' => 'Date Lajwdnd'
        ]);

            if ($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('pemanenans.index')
                ->withErrors($validator)
                    ->withInput();
            }

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

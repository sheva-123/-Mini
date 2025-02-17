<?php

namespace App\Http\Controllers;

use App\Models\Pemanenan;
use App\Models\Penanaman; // Model Penanaman
use App\Models\Pertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Validator;

class PemanenanController extends Controller
{
    use LogsActivity;
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

    return view('petani.pemanenans.index', compact('pemanenans', 'cari'));
    }

    // Menampilkan form tambah pemanenan
    public function create()
    {
        $user = Auth::user();

        $pertanians= Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->with('tanamans')
        ->get();
        return view('petani.pemanenans.create', compact('pertanians'));
    }

    // Menyimpan pemanenan
    public function store(Request $request)
    {
        $id = Auth::user();

        // dd($request->toArray());
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_pemanenan' => 'required|date',
            'jumlah_hasil' => 'required|integer',
        ],[
            'tanggal_pemanenan.date' => 'Date Lajwdnd'
        ]);

            // if($validator->fails()) {
            //     $error = $validator->errors();
            //     return redirect()->route('pemanenans.index')
            //                     ->withErrors($validator)
            //                     ->withInput();
            // }

        Pemanenan::create([
            'pertanian_id' => $request->pertanian_id,
            'tanaman_id' => $request->tanaman_id,
            'tanggal_pemanenan' => $request->tanggal_pemanenan,
            'jumlah_hasil' => $request->jumlah_hasil,
        ]);

        $this->logActivity('Menambah Pemanenan', 'Pengguna dengan nama ' . $id->name . ' menambahkan data pemanenan pada lahan miliknya.');

        return redirect()->route('pemanenans.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit pemanenan
    public function edit(Pemanenan $pemanenan)
    {
        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->with('tanamans')
        ->get();
        $penanaman = Penanaman::all();
        return view('petani.pemanenans.edit', compact('pemanenan', 'pertanians', 'penanaman'));
    }

    // Menyimpan perubahan pemanenan
    public function update(Request $request, Pemanenan $pemanenan)
    {
        $id = Auth::user();

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

        $this->logActivity('Edit Pemanenan', 'Pengguna dengan nama ' . $id->name . ' mengedit data pemenenan lahan miliknya.');

        return redirect()->route('pemanenans.index');
    }

    // Menghapus pemanenan
    public function destroy(Pemanenan $pemanenan)
    {
        $id = Auth::user();

        $pemanenan->delete();

        $this->logActivity('Menghapus Pemanenan', 'Pengguna dengan nama ' . $id->name . ' menghapus data pemanenan lahan miliknya.');
        return redirect()->route('pemanenans.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Penanaman;
use App\Models\Pertanian;
use App\Models\Pengeluaran;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class PemeliharaanController extends Controller
{
    use LogsActivity, SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Pemeliharaan::whereHas('pertanian', function ($query) use ($user) {
                    $query->whereHas('users', function ($q) use ($user) {
                        $q->where('users.id', $user->id);
                    });
                })
                ->whereHas('penanaman', function ($pQ) {
                    $pQ->where('status', 'Proses');
                })
                ->with('penanaman');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($puery) use ($search) {
                $puery->where('jenis_pemeliharaan', 'like', "%$search%")
                    ->orWhere('biaya', 'like', "%$search%")
                    ->orWhereHas('penanaman', function ($puQ) use ($search) {
                        $puQ->where('nama', 'like', "%$search%");
                    });
            });
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_pemeliharaan', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $pemeliharaans = $query->latest()->paginate(5)->appends([
            'search' => $request->search,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'sort' => $request->sort,
        ]);
        return view('petani.pemeliharaans.index', compact('pemeliharaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        $penanaman = Penanaman::whereHas('pertanian', function ($query) use ($user) {
            $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        })
        ->where('status', 'Proses')
        ->get();

        // dd($penanaman->toArray());
        return view('petani.pemeliharaans.create', compact('pertanians', 'penanaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->toArray());

        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Cukup,Buruk',
            'kondisi_lahan' => 'required|in:Kering,Basah,Lembab',
            'keterangan' => 'nullable|string|max:1000',
        ], [
            'biaya.min' => 'Biaya Tidak Boleh Minus',
        ]);

        // dd($request->keterangan);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemeliharaans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        if ($request->biaya > 0) {
            $pengeluaran = Pengeluaran::create([
                'pertanian_id' => $request->pertanian_id,
                'penanaman_id' => $request->penanaman_id,
                'tanggal_pengeluaran' => $request->tanggal_pemeliharaan,
                'jenis_pengeluaran' => $request->jenis_pemeliharaan,
                'biaya' => $request->biaya,
            ]);
        }


        $pemeliharaan = Pemeliharaan::create([
            'pertanian_id' => $request->pertanian_id,
            'penanaman_id' => $request->penanaman_id,
            'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan,
            'jenis_pemeliharaan' => $request->jenis_pemeliharaan,
            'biaya' => $request->biaya,
            'kondisi_tanaman' => $request->kondisi,
            'keterangan' => $request->input('keterangan'),
        ]);

        $pertanian = Pertanian::find($request->pertanian_id);
        if ($pertanian) {
            $pertanian->update([
                'kondisi' => $request->kondisi_lahan,
            ]);
        }

        // dd($pertanian);

        $lap = Laporan::create([
            'pertanian_id' => $pemeliharaan->pertanian_id,
            'penanaman_id' => $pemeliharaan->penanaman_id,
            'pemeliharaan_id' => $pemeliharaan->id,
            'pengeluaran_id' => $pengeluaran->id,
        ]);

        // dd($lap);

        $this->logActivity('Tambah Pemeliharaan', 'Pengguna dengan nama ' . $id->name . ' menambahkan pemeliharaan pada lahan yang dikelolanya');

        return redirect()->route('pemeliharaans.index')->with('success', 'Pemeliharaan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        // dd($pemeliharaan);
        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        $penanaman = Penanaman::whereHas('pertanian', function ($query) use ($user) {
            $query->whereHas('users', function ($uQ) use ($user) {
                $uQ->where('users.id', $user->id);
            });
        })
            ->where('status', 'Proses')
            ->get();
        return view('petani.pemeliharaans.edit', compact('pertanians', 'pemeliharaan', 'penanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
    {
        // dd($request->toArray());
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'penanaman_id' => 'required|exist:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Cukup,Buruk',
            'keterangan' => 'nullable|string|min:10|min:1000',
        ], [
            'biaya.min' => 'Biaya Tidak Boleh Minus',
        ]);

            // if ($validator->fails()) {
            //     $error = $validator->errors();
            //     return redirect()->route('pemeliharaans.edit')
            //     ->withErrors($validator)
            //         ->withInput();
            // }

            // dd($pemeliharaan);

        $pemeliharaan->update([
            'pertanian_id' => $request->pertanian_id,
            'penanaman_id' => $request->penanaman_id,
            'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan,
            'jenis_pemeliharaan' => $request->jenis_pemeliharaan,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        $this->logActivity('Edit Pemeliharaan', 'Pengguna dengan nama' . $id->name . ' mengedit data pemeliharaan lahan yang dikelolanya');

        return redirect()->route('pemeliharaans.index')->with('success', 'Pemeliharaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        // dd($pemeliharaan);

        try {
            $id = Auth::user();
            $pemeliharaan->forceDelete();

            $this->logActivity('Hapus Pemeliharaan', 'Pengguna dengan nama ' . $id->name . ' menghapus data pemeliharaan lahannya');

            return redirect()->route('pemeliharaans.index')
            ->with('error', 'Pemeliharaan Berhasil Di Hapus!');
        } catch (\Exception $e) {
            return redirect()->route('pemeliharaans.index')
            ->with('error', 'Pemeliharaan Gagal Di Hapus!');
        }
    }
}

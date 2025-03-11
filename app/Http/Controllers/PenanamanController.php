<?php

namespace App\Http\Controllers;

use App\Models\Penanaman;
use App\Models\Pertanian;
use App\Models\Tanaman;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Validator;

class PenanamanController extends Controller
{
    use LogsActivity;
    /**
     * Menampilkan daftar penanaman.
     */
    public function index(Request $request)
    {
        // dd($request->toArray());

        $user = Auth::user();

        $query = Penanaman::whereHas('pertanian', function ($query) use ($user) {
                    $query->whereHas('users', function ($q) use ($user) {
                        $q->where('users.id', $user->id);
                    });
                });

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search, $user) {
                $q->whereHas('pertanian', function ($subQ) use ($search, $user) {
                    $subQ->where('nama_pertanian', 'like', "%$search%")
                        ->whereHas('users', function ($userQ) use ($user) {
                            $userQ->where('users.id', $user->id);
                        });
                })
                    ->orWhere('nama', 'like', "%$search%")
                    ->orWhere('jumlah_tanaman', 'like', "%$search%");
            });
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_tanam', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $penanamans = $query->get();


        // dd($penanamans->toArray());  
            
        return view('petani.penanamans.index', compact('penanamans'));
    }


    /**
     * Menampilkan form untuk membuat penanaman baru.
     */
    public function create()
    {
        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();
        $tanamans = Tanaman::whereHas('pertanian', function ($query) use ($user) {
            $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        })->get();
        return view('petani.penanamans.create', compact('pertanians', 'tanamans'));
    }

    /**
     * Menyimpan penanaman baru.
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanaman_id' => 'required|exists:tanamans,id',
            'namaPenanaman' => 'required|string|max:225',
            'tanggal_tanam' => 'required|date',
            'jumlah_tanaman' => 'required|integer|min:0',
        ],[
            'tanggal_tanam.date' => 'Tanggal Wajib Di Isi',
            'jumlah_tanaman.min' => 'Jumlah Tidak Boleh Minus',
        ]);

        // dd($validator);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('penanamans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        $penanaman = Penanaman::create([
            'pertanian_id' => $request->pertanian_id,
            'tanaman_id' => $request->tanaman_id,
            'nama' => $request->namaPenanaman,
            'tanggal_tanam' => $request->tanggal_tanam,
            'jumlah_tanaman' => $request->jumlah_tanaman,
            'status' => 'Proses',
        ]);

        Laporan::create([
            'pertanian_id' => $penanaman->pertanian_id,
            'penanaman_id' => $penanaman->id,
        ]);

        $this->logActivity('Tambah Penanaman', 'Pengguna dengan nama ' . $id->name . ' menanam tanaman di lahan yang dikelolanya.');

        return redirect()->route('penanamans.index')->with('success', 'Penanaman berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit penanaman.
     */
    public function edit(Penanaman $penanaman)
    {
        $pertanians = Pertanian::all();
        $tanamans = Tanaman::all();
        return view('petani.penanamans.edit', compact('penanaman', 'pertanians', 'tanamans'));
    }

    /**
     * Mengupdate penanaman.
     */
    public function update(Request $request, Penanaman $penanaman)
    {
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanaman_id' => 'required|exists:tanamans,id',
            'tanggal_tanam' => 'required|date',
            'jumlah_tanaman' => 'required|integer',
        ], [
            'tanggal_tanam.date' => 'Date Required',
        ]);

            // if ($validator->fails()) {
            //     $error = $validator->errors();
            //     return redirect()->route('penanamans.index')
            //     ->withErrors($validator)
            //         ->withInput();
            // }

        $penanaman->update([
            'pertanian_id' => $request->pertanian_id,
            'tanaman_id' => $request->tanaman_id,
            'tanggal_tanam' => $request->tanggal_tanam,
            'jumlah_tanaman' => $request->jumlah_tanaman,
        ]);

        $this->logActivity('Edit Penanaman', 'Pengguna dengan nama ' . $id->name . ' mengedit tanaman yang ditanam pada lahan yang dikelolanya.');

        return redirect()->route('penanamans.index')->with('success', 'Penanaman berhasil diupdate.');
    }

    /**
     * Menghapus penanaman.
     */
    public function destroy(Penanaman $penanaman)
    {
        try {
            $id = Auth::user();
            $penanaman->delete();

            $this->logActivity('Hapus Penanaman', 'Pengguna dengan nama' . $id->name . ' menghapus tanaman yang ditanam pada lahan yang dikelolanya');
            return redirect()->route('penanamans.index')
            ->with('success', 'Penanaman Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->route('penanamans.index')
            ->with('error', 'Penanaman Gagal Di Hapus!');
        }
    }
}

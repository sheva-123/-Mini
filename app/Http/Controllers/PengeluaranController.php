<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Pertanian;
use App\Models\Penanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Validator;

class PengeluaranController extends Controller
{
    use LogsActivity;
    // Menampilkan daftar pengeluaran dengan fitur pencarian
    public function index(Request $request)
    {
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

        $pengeluarans = $query->get();

        return view('petani.pengeluarans.index', compact('pengeluarans'));
    }

    public function detail($id) 
    {
        $pengeluarans = Pengeluaran::where('penanaman_id', $id)
                                    ->with('penanaman')
                                    ->get();



        // dd($pengeluaran->toArray());

        return view('petani.pengeluarans.detail', compact('pengeluarans', 'id'));
    }

    public function show($id)
    {
        abort(404);
    }

    // Menampilkan form tambah pengeluaran
    public function create($id)
    {
        // dd($id);

        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        $penanamans = Penanaman::where('id', $id)->firstOrFail();
        // dd($penanamans);

        // dd($penanamans->toArray());

        // dd($pertanians);
        return view('petani.pengeluarans.create', compact('pertanians', 'penanamans'));

    }

    // Menyimpan pengeluaran
    public function store(Request $request)
    {
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric|min:0',
        ],[
            'biaya.numeric' => 'Inputan Biaya Harus Berupa Angka',
            'biaya.min' => 'Biaya Tidak Boleh Minus'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pengeluarans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        Pengeluaran::create([
            'pertanian_id' => $request->pertanian_id,
            'penanaman_id' => $request->penanaman_id,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'biaya' => $request->biaya,
        ]);

        $this->logActivity('Menambah Pengeluaran', 'Pengguna dengan nama'. $id->name . ' menambahkan pengeleuaran pada lahan yang dikelolanya');

        return redirect()->route('pengeluarans.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit pengeluaran
    public function edit(Pengeluaran $pengeluaran)
    {
        $user = Auth::user();

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();
        return view('petani.pengeluarans.edit', compact('pengeluaran', 'pertanians'));
    }

    // Menyimpan perubahan pengeluaran
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string',
            'biaya' => 'required|numeric|min:0',
        ],[
            'biaya.numeric' => 'Inputan Biaya Harus Berupa Jumlah Angka',
            'biaya.min' => 'Biaya Tidak Boleh Minus'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return redirect()->route('pengeluarans.index')
            ->withErrors($validator)
                ->withInput();
        }

        $pengeluaran->update([
            'pertanian_id' => $request->pertanian_id,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'biaya' => $request->biaya,
        ]);

        $this->logActivity('Edit Pengeluaran', 'Penggunana dengan nama ' . $id->name . ' mengedit pengeluaran lahan yang dikelolanya');

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    // Menghapus pengeluaran
    public function destroy(Pengeluaran $pengeluaran)
    {
        $id = Auth::user();

        $pengeluaran->delete();
        $this->logActivity('Hapus Pengeluaran', 'Pengguna dengan nama ' . $id->name . ' menghapus data pengeluaran lahan yang dikelolanya');
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Penanaman;
use App\Models\Pertanian;
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
                ->orWhere('jenis_pemeliharaan', 'like', "%$search%")
                ->orWhere('biaya', 'like', "%$search%");
            });
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_pemeliharaan', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $pemeliharaans = $query->get();
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
        return view('petani.pemeliharaans.create', compact('pertanians'));
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
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
        ], [
            'biaya.min' => 'Biaya Tidak Boleh Minus',
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemeliharaans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        Pemeliharaan::create($request->all());

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
        return view('petani.pemeliharaans.edit', compact('pertanians', 'pemeliharaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
    {
        // dd($pemeliharaan);
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
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

        $pemeliharaan->update($request->all());

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

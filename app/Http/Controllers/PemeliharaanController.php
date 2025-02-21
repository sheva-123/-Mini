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

        $query = Pemeliharaan::with('pertanian');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('jenis_pemeliharaan', 'like', "%{$search}%")
                  ->orWhereHas('penanamans', function ($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  });
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
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
        ], [
            'biaya.main' => 'Biaya Tidak Boleh Minus',
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
    public function update(Request $request, Pemeliharaan $pemeliharaans)
    {
        $id = Auth::user();

        $validator = Validator::make($request->all(), [
            'penanaman_id' => 'required|exists:penanamans,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
        ], [
            'biaya.min' => 'Biaya Tidak Boleh Minus',
        ]);

            if ($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pemeliharaans.index')
                ->withErrors($validator)
                    ->withInput();
            }

        $pemeliharaans->update($request->all());

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

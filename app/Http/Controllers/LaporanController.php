<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    use LogsActivity;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();


        $query = Laporan::whereHas('pertanian', function ($query) use ($user) {
            $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        });

        // Pencarian berdasarkan tanggal_laporan
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search, $user) {
                $q->whereHas('pertanian', function ($subQ) use ($search, $user) {
                    $subQ->where('nama_pertanian', 'like', "%$search%")
                    ->whereHas('users', function ($userQ) use ($user) {
                        $userQ->where('users.id', $user->id);
                    });
                })
                ->orWhere('jdeskripsi', 'like', "%$search%");
            });
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_laporan', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $laporans = $query->get();

        return view('petani.laporans.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        

        $pertanians = Pertanian::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->get();
        return view('petani.laporans.create', compact('pertanians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ],[
            'tanggal_laporan.date' => 'Date Required',
            'deskripsi.max:255' => 'Maximal string 255 character',
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('laporans.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        $validatedData = $request->validate([
            'pertanian_id' => 'required',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required',
        ]);

        Laporan::create($validatedData);

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        return view('petani.laporans.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        $pertanians = Pertanian::all();
        return view('petani.laporans.edit', compact('laporan', 'pertanians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $validator = Validator::make($request->all(), [
            'pertanian_id' => 'required|exists:pertanians,id',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ], [
            'tanggal_laporan.date' => 'Date Required',
            'deskripsi.max:255' => 'Maximal string 255 character',
        ]);

            if ($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('laporans.index')
                ->withErrors($validator)
                    ->withInput();
            }

        $laporan->update($request->all());

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        try {
            $laporan->delete();
            return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('laporans.index')->with('error', 'Terjadi kesalahan saat menghapus laporan: ' . $e->getMessage());
    }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pertanian;
use App\Models\Penanaman;
use App\Models\Pemeliharaan;
use App\Models\Pemanenan;
use App\Models\Pengeluaran;
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

        $query = Penanaman::whereHas('pertanian', function ($query) use ($user) {
            $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        })
        ->with('pemanenan');

        // Pencarian berdasarkan tanggal_laporan
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%$search%")
                ->orWhere('jumlah_tanaman', 'like', "%$search%");
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $laporans = $query->latest()->paginate(5)->appends([
            'search' => $request->search,
            'sort' => $request->sort,
        ]);

        // dd($pengeluaran);

        return view('petani.laporans.index', compact('laporans'));
    }

    public function detail($id)
    {
        $penanaman = Penanaman::where('id', $id)->first();

        $pemeliharaan = Pemeliharaan::whereHas('penanaman', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->get();

        $pengeluaranJml = Pengeluaran::whereHas('penanaman', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->sum('biaya');

        $pengeluaran = Pengeluaran::whereHas('penanaman', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->get();

        $pemanenan = Pemanenan::whereHas('penanaman', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->first();

        $laporan = Laporan::whereHas('penanaman', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->get();


        // dd($penanaman->toArray());
        return view('petani.laporans.detail', compact('penanaman', 'pemeliharaan', 'pengeluaran', 'pengeluaranJml', 'pemanenan', 'laporan'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petani_Lahan;
use App\Models\Pertanian;
use App\Models\Tanaman;
use App\Models\Penanaman;
use App\Models\Pemanenan;
use App\Models\Pengeluaran;
use App\Models\Pemeliharaan;
use Illuminate\Support\Facades\Auth;


class UserHomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $penanaman = Penanaman::whereHas('pertanian', function ($query) use ($user) {
                        $query->whereHas('users', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->sum('jumlah_tanaman');

        $pemanenan = Pemanenan::whereHas('pertanian', function ($query) use ($user) {
                        $query->whereHas('users', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->sum('jumlah_hasil');

        $pengeluaran = Pengeluaran::whereHas('pertanian', function ($query) use ($user) {
                        $query->whereHas('users', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->with('penanaman')
                    ->latest()
                    ->take(5)
                    ->get();

        $pemeliharaan = Pemeliharaan::whereHas('pertanian', function ($query) use ($user) {
                        $query->whereHas('users', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->with('penanaman')
                    ->latest()
                    ->take(5)
                    ->get();

        $lahan = Pertanian::whereHas('users', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })
                ->with('tanaman')
                ->first();

        $tanaman = Tanaman::whereHas('pertanian', function ($query) use ($user) {
                        $query->whereHas('users', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->first();

                    // dd($lahan);

        return view('petani.dashboard', compact('penanaman', 'pemanenan', 'pengeluaran', 'pemeliharaan', 'lahan', 'tanaman'));
    }
}

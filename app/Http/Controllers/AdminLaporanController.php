<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Penanaman;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penanaman::with('pertanian', 'pemanenan', 'pertanian.users', 'tanaman');

        // Pencarian berdasarkan tanggal_laporan
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('pertanian', function ($subQ) use ($search) {
                    $subQ->where('nama_pertanian', 'like', "%$search%");
                })
                ->orWhereHas('pertanian.users', function ($userQ) use ($search) {
                    $userQ->where('name', 'like', "%$search%");
                })
                ->orWhereHas('tanaman', function ($tQ) use ($search) {
                    $tQ->where('nama_tanaman', 'like', "%$search%");
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

        $laporans = $query->get();

        return view('admin.laporans.index', compact('laporans'));
    }

    public function show(Request $request, $id)
    {

        $query = Laporan::whereHas('pertanian', function ($query) use ($id) {
                    $query->whereHas('users', function ($q) use ($id) {
                        $q->where('users.id', $id);
                    });
                });

        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search, $id) {
                $q->whereHas('pertanian', function ($subQ) use ($search, $id) {
                    $subQ->where('nama_pertanian', 'like', "%$search%")
                    ->whereHas('users', function ($userQ) use ($id) {
                        $userQ->where('users.id', $id);
                    });
                })
                ->orWhere('deskripsi', 'like', "%$search%");
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

        $laporan = $query->get();
        // dd($user->toArray());

        return view('admin.laporans.show', compact('laporan', 'id'));
    }
}

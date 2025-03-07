<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereHas('pertanian')
                            ->with('pertanian')
                            ->get();

        
        

        return view('admin.laporans.index', compact('users'));
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

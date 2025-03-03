<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        // Admin bisa melihat semua laporan
        $query = Laporan::query();

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_laporan', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        // Pencarian berdasarkan pertanian atau deskripsi
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('pertanian', function ($subQ) use ($search) {
                    $subQ->where('nama_pertanian', 'like', "%$search%");
                })->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        $laporans = $query->get();
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->with('pertanian', 'pertanian.laporan')->get();

        return view('admin.laporans.index', compact('laporans', 'users'));
    }

    public function show($id)
    {
        $laporan = Laporan::with('pertanian', 'pertanian.users')->findOrFail($id);

        return view('admin.laporans.show', compact('laporan'));
    }
}

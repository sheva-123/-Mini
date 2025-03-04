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

        // dd($users->toArray());
        

        return view('admin.laporans.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('pertanian.laporan')
                        ->where('id', $id)
                        ->firstOrFail();

        // dd($user->toArray());

        return view('admin.laporans.show', compact('user'));
    }
}

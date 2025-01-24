<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pertanian; // Sesuaikan dengan model lahan yang Anda gunakan
use App\Models\Petani_Lahan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        // Ambil data lahan dari model Pertanian (sesuaikan dengan model Anda)
        $lahan = Pertanian::all();

        return view('admin.pengguna.index', compact('users', 'lahan'));
    }

    public function tambahlahan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pertanian_id' => 'required|exists:pertanians,id'
        ]);

        Petani_Lahan::create([
            'user_id' => $request->user_id,
            'petanian_id' => $request->pertanian_id
        ]);

        return redirect()->route('pengguna.index')
                        ->with('success', 'Berhasil Menambah Lahan Ke Petani');
    }
}
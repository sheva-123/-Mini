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
        })
        ->with('pertanian')
        ->get();

        $lahan = Pertanian::whereDoesntHave('users')->get(); 

        $addUsers = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->doesntHave('pertanian')
        ->get();

        return view('admin.pengguna.index', compact('users', 'lahan', 'addUsers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'user_id' => 'required',
            'pertanian_id' => 'required',
        ]);

        Petani_Lahan::create([
            'user_id' => (int) $request->input('user_id'),
            'pertanian_id' => (int) $request->input('pertanian_id'),
        ]);

        return redirect()->route('pengguna.index')
                        ->with('success', 'Berhasil Menambah Lahan Ke Petani');
    }
}
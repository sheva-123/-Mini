<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petani_Lahan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('admin.pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function tambahlahan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lahan_id' => 'required|exists:pertanians,id'
        ]);

        Petani_Lahan::create([
            'user_id' => $request->user_id,
            'petani_id' => $request->lahan_id
        ]);

        return redirect()->route('pengguna.index')
                        ->with('success', 'Berhasil Menambah Lahan Ke Petani');
    }
}

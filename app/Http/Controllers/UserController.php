<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('admin.Pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.Pengguna.create');
    }
}

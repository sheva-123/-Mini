<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pertanian;
use App\Models\Tanaman;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        $lahan = Pertanian::all();
        $tanaman = Tanaman::all();

        return view('admin.dashboard', compact('users', 'lahan', 'tanaman'));
    }
}

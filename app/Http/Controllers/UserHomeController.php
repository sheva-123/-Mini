<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petani_Lahan;

class UserHomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $lahan = $user->pertanian;

        return view('petani.dashboard', compact('lahan'));
    }
}

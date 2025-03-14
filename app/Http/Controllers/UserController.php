<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pertanian; // Sesuaikan dengan model lahan yang Anda gunakan
use App\Models\Petani_Lahan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $query = User::whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'admin');
                })
                ->with('pertanian');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        }

        if ($request->filled('filter')) {
            $filter = $request->filter;
            if($filter === 'false') {
                $query->where('status_lahan', false);
            } elseif ($filter === 'true') {
                $query->where('status_lahan', true);
            } elseif ($filter === 'verif') {
                $query->doesntHave('roles');
            }
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $lahan = Pertanian::whereDoesntHave('users')->get();

        $addUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })
        ->where('status_lahan', false)
        ->get();

        $userVerif = User::doesntHave('roles')->get();

        $users = $query->latest()->paginate(5)->appends([
            'search' => $request->search,
            'filter' => $request->filter,
            'sort' => $request->sort,
        ]);

        return view('admin.pengguna.index', compact('users', 'lahan', 'addUsers', 'userVerif'));
    }

    public function verifikasi($id)
    {
        $user = User::find($id);

        if (!$user || $user->roles->isNotEmpty()) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan atau sudah memiliki role.');
        }

        $user->assignRole('user');
        $user->update(['is_verified' => true]);

        return redirect()->back()->with('success', 'Pengguna berhasil diverifikasi.');
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

        $userid = $request->user_id;
        $user = user::findOrFail($userid);
        $user->status_lahan = true;
        $user->save();



        return redirect()->route('pengguna.index')
                        ->with('success', 'Berhasil Menambah Lahan Ke Petani');
    }

    // public function search(Request $request)
    // {
    //     $request->validate([
    //         'keyword' => ['required', 'string', 'max:255']
    //     ]);

    //     $keyword = $request->keyword;

    //     $users = User::where('name', 'like', "%$keyword%")
    //                         ->orWhere('email', 'like', "%$keyword%")
    //                         ->paginate(3);

    //     $lahan = Pertanian::whereDoesntHave('users')->get();

    //     $addUsers = User::whereDoesntHave('roles', function ($query) {
    //         $query->where('name', 'admin');
    //     })
    //         ->doesntHave('pertanian')
    //         ->get();

    //     return view('admin.pengguna.search', compact('users', 'lahan', 'addUsers'));
    // }

    public function filter(Request $request)
    {
        if(empty($request)) {
            $lahan = Pertanian::whereDoesntHave('users')->get();

            $addUsers = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
                ->doesntHave('pertanian')
                ->get();

            $userBelum = User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
                ->doesntHave('pertanian')
                ->get();

            return view('admin.pengguna.filter', compact('userBelum', 'lahan', 'addUsers'));
        } else {
            $lahan = Pertanian::whereDoesntHave('users')->get();

            $addUsers = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
                ->doesntHave('pertanian')
                ->get();

            $userSudah = User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
                ->whereHas('pertanian')
                ->get();

            return view('admin.pengguna.filter', compact('userSudah', 'lahan', 'addUsers'));
        }
    }
}

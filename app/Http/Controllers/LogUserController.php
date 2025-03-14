<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class LogUserController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('activity', 'like', "%$search%")
                ->orWhere('desscription', 'like', "%$search%");
            })->orWhereHas('user', function ($subQ) use ($search) {
                $subQ->where('name', 'like', "%$search%");
            });
        }

        if ($request->filled('filter')) {
            $filter = $request->filter;
            if($filter === 'Tambah') {
                $query->where('activity', 'like', "%$filter%");
            } elseif ($filter === 'Edit') {
                $query->where('activity', 'like', "%$filter%");
            } elseif ($filter === 'Log in') {
                $query->where('activity', 'like', "%$filter%");
            } elseif ($filter === 'Log out') {
                $query->where('activity', 'like', "%$filter%");
            } elseif ($filter === 'Register') {
                $query->where('activity', 'like', "%$filter%");
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

        $activityLogs = $query->latest()->paginate(10)->appends([
            'search' => $request->search,
            'filter' => $request->filter,
            'sort' => $request->sort,
        ]);

        return view('admin.log.index', compact('activityLogs'));
    }
}

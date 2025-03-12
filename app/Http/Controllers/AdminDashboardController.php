<?php

namespace App\Http\Controllers;

use App\Charts\SemuaJumlahCharts;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pertanian;
use App\Models\Tanaman;
use App\Models\ActivityLog;
use App\Models\Pemeliharaan;
use App\Models\Pemanenan;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(SemuaJumlahCharts $charts)
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        $lahan = Pertanian::all();
        $tanaman = Tanaman::all();

        $activityLogs = ActivityLog::with('user')
                        ->with('user')
                        ->latest()
                        ->take(5)
                        ->get();

        $chart = $charts->build();

        // dd($chart);

        return view('admin.dashboard', compact('users', 'lahan', 'tanaman', 'activityLogs', 'chart'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Charts\SemuaJumlahCharts;
use App\Charts\PanenTanamanChart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pertanian;
use App\Models\Tanaman;
use App\Models\Pemeliharaan;
use App\Models\Pemanenan;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(SemuaJumlahCharts $semuaJumlahCharts, PanenTanamanChart $panenTanamanChart)
    {
        // Mendapatkan data pengguna selain admin
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        // Mengambil data pertanian dan tanaman
        $lahan = Pertanian::all();
        $tanaman = Tanaman::all();

        // Membuat grafik berdasarkan chart yang diterima
        $semuaJumlahChart = $semuaJumlahCharts->build();
        $panenTanamanChart = new PanenTanamanChart;
        $panenTanamanChart = $panenTanamanChart->build();

        // Mengembalikan view dengan data yang dibutuhkan
        return view('admin.dashboard', compact('users', 'lahan', 'tanaman', 'semuaJumlahChart', 'panenTanamanChart'));
    }
}

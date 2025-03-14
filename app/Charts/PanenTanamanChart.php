<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\BarChart as OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;
use App\Models\Pemanenan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PanenTanamanChart
{
    public function build(): OriginalBarChart
    {
        $today = Carbon::now();
        $sixMonthsAgo = $today->copy()->subMonths(6);

        $panenBerhasilPerBulan = Pemanenan::where('status_panen', 'Berhasil')
            ->where('tanggal_pemanenan', '>=', $sixMonthsAgo)
            ->select(
                DB::raw('MONTH(tanggal_pemanenan) as bulan'),
                DB::raw('YEAR(tanggal_pemanenan) as tahun'),
                DB::raw('SUM(jumlah_hasil) as total_hasil')
            )
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        $panenGagalPerBulan = Pemanenan::where('status_panen', 'Gagal')
            ->where('tanggal_pemanenan', '>=', $sixMonthsAgo)
            ->select(
                DB::raw('MONTH(tanggal_pemanenan) as bulan'),
                DB::raw('YEAR(tanggal_pemanenan) as tahun'),
                DB::raw('SUM(jumlah_hasil) as total_hasil')
            )
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $dataGagal = [];
        $dataBerhasil = [];

        // Menyiapkan data untuk 6 bulan terakhir
        for ($i = 0; $i < 6; $i++) {
            $month = $sixMonthsAgo->copy()->addMonths($i);
            $monthYear = $month->format('M Y');
            $labels[] = $monthYear;

            // Default nilai 0 untuk setiap bulan
            $bulanTahun = [
                'bulan' => $month->month,
                'tahun' => $month->year
            ];

            // Cari data berhasil untuk bulan ini
            $hasilBerhasil = $panenBerhasilPerBulan
                ->where('bulan', $bulanTahun['bulan'])
                ->where('tahun', $bulanTahun['tahun'])
                ->first();

            // Cari data gagal untuk bulan ini
            $hasilGagal = $panenGagalPerBulan
                ->where('bulan', $bulanTahun['bulan'])
                ->where('tahun', $bulanTahun['tahun'])
                ->first();

            // Tambahkan nilai ke array data
            $dataBerhasil[] = $hasilBerhasil ? $hasilBerhasil->total_hasil : 0;
            $dataGagal[] = $hasilGagal ? $hasilGagal->total_hasil : 0;
        }

        return (new OriginalBarChart)
            ->setTitle('Perbandingan Tanaman Yang Berhasil Panen dan Gagal Panen')
            ->setSubtitle('Data 6 bulan terakhir')
            ->addData('Berhasil', $dataBerhasil)
            ->addData('Gagal', $dataGagal)
            ->setXAxisOption(new XAxisOption($labels));

            dd($dataBerhasil);
    }
}

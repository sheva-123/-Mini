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
        $currentYear = Carbon::now()->year;
        $startOfYear = Carbon::createFromDate($currentYear, 1, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($currentYear, 12, 31)->endOfDay();

        $panenBerhasilPerBulan = Pemanenan::where('status_panen', 'Berhasil')
            ->whereYear('tanggal_pemanenan', $currentYear)
            ->select(
                DB::raw('MONTH(tanggal_pemanenan) as bulan'),
                DB::raw('SUM(jumlah_hasil) as total_hasil')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $panenGagalPerBulan = Pemanenan::where('status_panen', 'Gagal')
            ->whereYear('tanggal_pemanenan', $currentYear)
            ->select(
                DB::raw('MONTH(tanggal_pemanenan) as bulan'),
                DB::raw('SUM(jumlah_hasil) as total_hasil')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $dataGagal = [];
        $dataBerhasil = [];

        $monthNames = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = $monthNames[$month - 1];

            $hasilBerhasil = $panenBerhasilPerBulan
                ->where('bulan', $month)
                ->first();

            $hasilGagal = $panenGagalPerBulan
                ->where('bulan', $month)
                ->first();

            $dataBerhasil[] = $hasilBerhasil ? $hasilBerhasil->total_hasil : 0;
            $dataGagal[] = $hasilGagal ? $hasilGagal->total_hasil : 0;
        }

        return (new OriginalBarChart)
            ->setTitle('Perbandingan Tanaman Yang Berhasil Panen dan Gagal Panen')
            ->setSubtitle('Data tahun ' . $currentYear)
            ->addData('Berhasil', $dataBerhasil)
            ->addData('Gagal', $dataGagal)
            ->setXAxisOption(new XAxisOption($labels))
            ->setHeight(340);
    }
}

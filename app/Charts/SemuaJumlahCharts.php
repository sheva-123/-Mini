<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\DonutChart AS OriginalDonutChart;
use App\Models\Pemanenan;
use App\Models\Penanaman;

class SemuaJumlahCharts
{
    public function build(): OriginalDonutChart
    {
        $penanaman = Penanaman::all()
                            ->sum('jumlah_tanaman');
        $pemanenan = Pemanenan::all()
                            ->sum('jumlah_hasil');

        // dd($penanaman, $pemanenan);

        return (new OriginalDonutChart)
            ->setTitle('Chart Penanaman dan Pemanenan.')
            ->setSubtitle('Jumlah Tanaman Berdasarkan Penanaman Dan Pemanenan')
            ->addData([$penanaman, $pemanenan])
            ->setLabels(['Tanam', 'Panen']);
    }
}

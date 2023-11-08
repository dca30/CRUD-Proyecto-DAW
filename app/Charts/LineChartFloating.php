<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class LineChartFloating
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($total)
    {
        return $this->chart->lineChart()
            ->setHeight(300)
            ->setTitle("Evolucion Total Balances (€)")
            ->addData('Total', $total)
            ->setColors(['#FF5733'])
            ->setXAxis(['2014', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '2023']);
    }
}

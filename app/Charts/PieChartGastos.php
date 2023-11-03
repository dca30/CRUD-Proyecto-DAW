<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartGastos
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build($gastos, $labels)
    {
        return $this->chart->pieChart()
            ->setTitle('GASTOS')
            ->addData($gastos)
            ->setLabels($labels);
    }
}
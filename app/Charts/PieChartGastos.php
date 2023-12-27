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
    public function build($gastos, $labels, $title)
    {
        return $this->chart->pieChart()
            ->setTitle($title)
            ->addData($gastos)
            ->setLabels($labels);
    }
}
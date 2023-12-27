<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartIngresos
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build($ingresos, $labels,$title)
    {
        return $this->chart
            ->pieChart()
            ->setTitle($title)
            ->addData($ingresos)
            ->setLabels($labels);
    }
}
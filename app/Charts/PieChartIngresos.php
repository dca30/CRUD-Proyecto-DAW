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
    public function build($ingresos, $labels)
    {
        return $this->chart
            //->donutChart()
            ->pieChart()
            ->setTitle('INGRESOS')
            ->addData($ingresos)
            ->setLabels($labels);
    }
}
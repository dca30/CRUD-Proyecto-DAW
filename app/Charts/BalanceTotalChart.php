<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BalanceTotalChart
{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build($totals, $years)
    {
        return $this->chart
            ->barChart()
            ->setTitle('Evolución del valor total')
            ->setSubtitle('Valores totales de balances en el tiempo')
            ->addData('Total', $totals->all())
            ->setXAxis($years->all());
    }
}
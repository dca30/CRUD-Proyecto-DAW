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
    public function build($total, $years, $ingreso_c_b,$ingreso_aso,$ingreso_chapas,$ingreso_guinote,$ingreso_patrocinio,$gasto_premios,$gasto_tickets,$gasto_c_b,$gasto_disco,$gasto_juegos,$labels)
    {
        return $this->chart
            ->lineChart()
            ->setTitle($labels[0])
            ->setSubtitle($labels[1])
            ->addData($labels[2], $ingreso_c_b->all())
            ->addData($labels[3], $ingreso_aso->all())
            ->addData($labels[4], $ingreso_chapas->all())
            ->addData($labels[5], $ingreso_guinote->all())
            ->addData($labels[6], $ingreso_patrocinio->all())
            ->addData($labels[7], $gasto_premios->all())
            ->addData($labels[8], $gasto_tickets->all())
            ->addData($labels[2], $gasto_c_b->all())
            ->addData($labels[9], $gasto_disco->all())
            ->addData($labels[10], $gasto_juegos->all())
            ->setXAxis($years->all());
    }
}